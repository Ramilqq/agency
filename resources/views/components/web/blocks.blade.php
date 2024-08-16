@foreach($values as $key => $value)
    <div class="p-4 w-full">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-slate-50">
            <div class="p-6">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                    @if(isset($value->Name))
                    {{ $value->Name }}
                    @else
                    {{ $value->Id }}
                    @endif
                </h1>
                <div>
                    @if($value->Type == 'TEXT_CAMPAIGN')
                    <a href="{{route('campaign-show', $value->Id)}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Открыть компанию</a>
                    @elseif($value->Type == 'TEXT_AD_GROUP')
                    <a href="{{route('ads-show', [$value->CampaignId, $value->Id])}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Открыть объявления группы</a>
                    @endif
                </div>
                <hr/>
                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                    
                </h2>
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                    
                </h1>

                <x-web.list  :value="$value"/>

            </div>
        </div>
    </div>
@endforeach
