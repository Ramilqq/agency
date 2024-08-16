<x-web.base>

    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
        {{$campaign->Name}}
    </h2>

    <div>
        <p>
            <b>ClientInfo: </b> {{$campaign->ClientInfo}}<br/>
            <b>TimeZone: </b>{{$campaign->TimeZone}}<br/>
            <b>Id: </b>{{$campaign->Id}}<br/>
            <b>Name: </b>{{$campaign->Name}}<br/>
            <b>StartDate: </b>{{$campaign->StartDate}}<br/>
            <b>Type: </b>{{$campaign->Type}}<br/>
            <b>Status: </b>{{$campaign->Status}}<br/>
            <b>State: </b>{{$campaign->State}}<br/>
            <b>StatusPayment: </b>{{$campaign->StatusPayment}}<br/>
            <b>StatusClarification: </b>{{$campaign->StatusClarification}}<br/>
            <b>SourceId: </b>{{$campaign->SourceId}}<br/>
            <b>Currency: </b>{{$campaign->Currency}}<br/>
            <b>DailyBudget: </b>{{$campaign->DailyBudget}}<br/>
            <b>EndDate: </b>{{$campaign->EndDate}}<br/>
            <b>BlockedIps: </b>{{$campaign->BlockedIps}}<br/>
            <b>ExcludedSites: </b>{{$campaign->ExcludedSites}}<br/>

            <b>Notification: </b><pre class="bg-gray-400">{{print_r($campaign->Notification, 1)}}</pre> <br/>
            <b>Statistics: </b><pre class="bg-gray-400">{{print_r($campaign->Statistics, 1)}}</pre> <br/>
            <b>Funds: </b><pre class="bg-gray-400">{{print_r($campaign->Funds, 1)}}</pre> <br/>
            <b>RepresentedBy: </b><pre class="bg-gray-400">{{print_r($campaign->RepresentedBy, 1)}}</pre> <br/>
            <b>NegativeKeywords: </b><pre class="bg-gray-400">{{print_r($campaign->NegativeKeywords, 1)}}</pre> <br/>
            <b>TimeTargeting: </b><pre class="bg-gray-400">{{print_r($campaign->TimeTargeting, 1)}}</pre> <br/>
        </p>
    </div>

    
    <div class="w-full mb-20 flex-col items-center text-center">
        <a href="{{route('campaign-get')}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Открыть группу объявлений</a>
    </div>

</x-web.base>