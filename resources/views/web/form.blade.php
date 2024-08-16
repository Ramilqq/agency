<x-web.base>

    <form class="container px-5 py-24 mx-auto flex" action="{{route('agens-clients-store')}}" method="POST"> 
        @method('POST')
        @csrf
        <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col m-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Создать клиента</h2>
            <p class="leading-relaxed mb-5 text-gray-600">Поля для создания компании</p>

            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input value="{{ old('email') }}" type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('email')<div id="emailFeedback" class="invalid-email">{{ $message }}</div>@enderror
            </div>

            <div class="relative mb-4">
                <label for="login" class="leading-7 text-sm text-gray-600">Логин</label>
                <input value="{{ old('login') }}" type="text" id="login" name="login" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('login')<div id="loginFeedback" class="invalid-login">{{ $message }}</div>@enderror
            </div>

            <div class="relative mb-4">
                <label for="type" class="leading-7 text-sm text-gray-600">Тип</label>
                <select name="type" class="w-full rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                    <option value="PHYSICAL">PHYSICAL</option>
                    <option value="FOREIGN_PHYSICAL">FOREIGN_PHYSICAL</option>
                    <option value="LEGAL">LEGAL</option>
                    <option value="FOREIGN_LEGAL">FOREIGN_LEGAL</option>
                    <option value="INDIVIDUAL">INDIVIDUAL</option>
                </select>
                @error('type')<div id="typeFeedback" class="invalid-type">{{ $message }}</div>@enderror
            </div>

            <div class="relative mb-4">
                <label for="inn" class="leading-7 text-sm text-gray-600">ИНН (Tin)</label>
                <input value="{{ old('inn') }}" type="text" id="inn" name="inn" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('inn')<div id="innFeedback" class="invalid-inn">{{ $message }}</div>@enderror
            </div>

            <div class="relative mb-4">
                <label for="firstname" class="leading-7 text-sm text-gray-600">Имя</label>
                <input value="{{ old('firstname') }}" type="text" id="firstname" name="firstname" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('firstname')<div id="firstnameFeedback" class="invalid-firstname">{{ $message }}</div>@enderror
            </div>

            <div class="relative mb-4">
                <label for="lastname" class="leading-7 text-sm text-gray-600">Фамилие</label>
                <input value="{{ old('lastname') }}" type="text" id="lastname" name="lastname" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('lastname')<div id="lastnameFeedback" class="invalid-lastname">{{ $message }}</div>@enderror
            </div>
            

            <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Создать</button>
            <p class="text-xs text-gray-500 mt-3">Какойто текст.</p>
        </div>
    </form>


</x-web.base>