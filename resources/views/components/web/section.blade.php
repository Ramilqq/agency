<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Технологии Яндекса</h1>
        </div>

        <div class="w-full mb-20 flex-col items-center text-center">
            <a href="{{route('campaign-get')}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Все компании</a>
            <a href="{{route('agens-clients-create')}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Создать клиента</a>
        
        </div>

        <div class="flex flex-wrap -m-4">
            @foreach($data[0] as $v)
                <div class="pb-5 w-full ">
                    <div class="border border-gray-200 p-6 rounded-lg bg-slate-100">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                            Метод: {{$v['method']}}
                            @if(isset($v['params']))
                                <br/>Параметры: 
                                @foreach($v['params'] as $paramName => $param)
                                    {{$paramName}} = {{ $param }}
                                @endforeach
                            @endif
                        </h2>
                            @if ($v['values'])
                            <x-web.blocks  :values="$v['values']"/>
                            @else
                            <div class="bg-yellow-200">
                                Нет данных.
                            </div>
                            @endif
                    </div>
                </div>
            @endforeach


            @if(isset($data[1]))
                <div class="pb-5 w-full ">
                    <div class="border border-gray-200 p-6 rounded-lg bg-slate-100">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                            Метод: Reports
                        </h2>
                            
                            <table class="table-auto bg-green-200 w-full">
                                @if($data[1])
                                    @foreach ($data[1] as $key => $value)
                                        @if($key == 1)
                                        <thead>
                                            <tr>
                                                @foreach ($value as $table_key => $table_value)
                                                    <th>{{$table_value}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        @endif

                                        @if($key == 2)
                                        <tbody>
                                        @endif

                                        @if($key >= 2)
                                            <tr>
                                                @foreach ($value as $table_key => $table_value)
                                                    <th class="border border-solid border-black">{{$table_value}}</th>
                                                @endforeach
                                            </tr>
                                        @endif
                                    
                                @endforeach
                                    </tbody>
                                @else
                                    Отчетов не найдено =()
                                @endif
                                
                            </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>