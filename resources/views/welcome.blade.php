<x-guest-layout>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/clients') }}" class="text-sm text-gray-700 underline">Turnero</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">                    
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">                   
                    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                        <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                            Shifts-App
                        <br>
                        <span class="text-indigo-600">Gestion de turnos</span>
                        </h2>
                    </div>
                    <div class="flex flex-col">                    
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">                        
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"> 
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha   
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Hora
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Estado
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Cliente
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($turns as $turn)       
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                                {{ $turn->date }} 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                    <div class="text-sm leading-5 text-gray-900">{{ $turn->time }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($turn->done) bg-pink-300 text-black-800 @else bg-green-300 text-black-800 @endif">
                                                        @if($turn->done)
                                                            Resuelta
                                                        @else
                                                            Pendiente
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                    <div class="text-sm leading-5 text-gray-900">{{ $turn->client->name }}</div>
                                                </td>
                                                <td class="px-5 py-4 flex space-x-4">
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>                              
            </div>
        </div>

</x-guest-layout>