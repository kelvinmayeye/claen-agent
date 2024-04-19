<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function getAgentServices(){ //get services page and services according to current login user
        $agentServices = AgentService::where('id',Auth::id())->get();
        $services = Service::where('status','active')->get();
        return view('pages.agents.agent-services',compact('agentServices','services'));
    }

    public function storeAgentServices(){
        return response()->json(['status'=>'success']);
    }
}
