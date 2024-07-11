<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use function Termwind\renderUsing;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('pages.services.service-list',compact('services'));
    }

    public function store(Request $request){
        $service = $request->except('_token');
        try{
            Service::create($service);
        }catch (\Exception $e){
            throw $e;
            return back()->with('error','failed to add service');
        }
        Alert::success('Service Added', 'Service were added successful');
        return back();
    }

    public function serviceOffered(){
        $services = AgentService::all();
        return view('pages.customers.service-offered',compact('services'));
    }

    public function agentServices(){
        $services = AgentService::where('agent_id',Auth::id())->get();
        return view('pages.agents.agent-services',compact('services'));
    }

    public function add_review(Request $request){
        $agent = User::find($request->get('agent_id'));
        if ($agent){
            Review::create([
                'comment'=>$request->get('comment')??null,
                'customer_id'=>Auth::id(),
                'agent_id'=>$agent->id
            ]);
            Alert::success('Review Added', 'Thank you for your review');
        }
        return back();
    }

    public function view_review(){
       $reviews = Review::list()->get();
        if(!empty($reviews)){
            return view('pages.admin.all-reviews',compact('reviews'));
        }
        Alert::error('No Reviews', 'No Reviews yet');
        return back();
    }


}
