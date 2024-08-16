<x-web.base>
    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
        Список компаний
    </h2>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border border-solid border-black">Id</th>
                <th class="border border-solid border-black">Name</th>
                <th class="border border-solid border-black">StartDate</th>
                <th class="border border-solid border-black">Type</th>
                <th class="border border-solid border-black">Status</th>
                <th class="border border-solid border-black">State</th>
                <th class="border border-solid border-black">StatusPayment</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($campaigns))
                @foreach($campaigns as $campaign)
                <tr>
                    <td class="border border-solid border-black">{{$campaign->Id}}</td>
                    <td class="border border-solid border-black">
                        <a class="underline decoration-1 text-sky-500 hover:text-sky-900" href="{{route('campaign-show', $campaign->Id)}}">{{$campaign->Name}}</a>
                    </td>
                    <td class="border border-solid border-black">{{$campaign->StartDate}}</td>
                    <td class="border border-solid border-black">{{$campaign->Type}}</td>
                    <td class="border border-solid border-black">{{$campaign->Status}}</td>
                    <td class="border border-solid border-black">{{$campaign->State}}</td>
                    <td class="border border-solid border-black">{{$campaign->StatusPayment}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</x-web.base>