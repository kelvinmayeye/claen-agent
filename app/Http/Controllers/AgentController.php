<?php

namespace App\Http\Controllers;

use App\Models\AgentService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    public function getAgentServices(){ //get services page and services according to current login user
        $agentServices = AgentService::where('agent_id',Auth::id())->get();
        $services = Service::where('status','active')->get();
        return view('pages.agents.agent-services',compact('agentServices','services'));
    }

    public function storeAgentServices(Request $request){

        $service = Service::find($request->serviceId);
        if ($service){
            $existingAgentService = AgentService::query()->where('agent_id',\Auth::id())->where('service_id',$service->id)->get();
            if ($existingAgentService->count() == 0){
                $agentService = AgentService::create([
                    'agent_id'=>\Auth::id(),
                    'service_id'=>$service->id,
                ]);
            }else{
                return response()->json(['status'=>'success','msg'=>'Service already existing']);
            }
            $result = ['status'=>'success','msg'=>'Service added successful','data'=>$agentService];
        }else{
            $result = ['status'=>'error','msg'=>'Service was not found'];

        }
        return response()->json($result);
    }

    public function agentServiceDetails($id){
        $agentService = AgentService::find($id);
        if(!$agentService){
            Alert::toast('Service not found');
            return back();
        }
        return view('pages.agents.agents-service-details',compact('agentService'));
    }

    public function saveAgentServiceUpdate(Request $request){
        $agentService = AgentService::find($request->agent_service_id);
        if(!$agentService){
            Alert::toast('Service not found');
            return back();
        }
        $agentService->update([
            'description'=>$request->description
        ]);
        Alert::toast('Service updated successful');
        return redirect()->route('agent.get.services');
    }

    public function changeStatus($id){
        $agentService = AgentService::find($id);
        if(!$agentService){
            Alert::toast('Service not found');
            return back();
        }
        if($agentService->status == 'active'){
            $agentService->update([
                'status'=>'inactive'
            ]);
        }else{
            $agentService->update([
                'status'=>'active'
            ]);
        }
        Alert::toast('Service Status Changed');
        return back();
    }

    public function deleteAgentService($id)
    {
        // Find the agent service by ID
        $agentService = AgentService::find($id);

        // Check if agent service exists
        if (!$agentService) {
            Alert::toast('Service not found');
            return back();
        }

        // Check if the service has bookings
        if ($agentService->bookings->count() > 0) {
            Alert::toast('This service has bookings and cannot be deleted');
            return back();
        }

        // Delete the agent service
        if ($agentService->delete()) {
            Alert::toast('Service deleted successfully');
            return back();
        }

        // If deletion fails for any reason
        Alert::toast('Failed to delete service');
        return back();
    }

}