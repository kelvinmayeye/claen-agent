<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\Service;
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
            return back()->with('error','service added successfuly');
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
}
