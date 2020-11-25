<x-encabezado>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Datos TURNO</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Ingrese datos del turno
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method='POST' action="{{ route('turns.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-5 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block uppercase tracking-wide font-medium text-xs font-bold text-gray-700" for="date">
                                        Fecha
                                    </label>
                                    <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="date" id="date" name="date" value="{{ old('date') }}">
                                    @error('date')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block uppercase tracking-wide font-medium text-xs font-bold text-gray-700" for="time">
                                        Hora
                                    </label>
                                    <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="time" id="time" name="time" value="{{ old('time') }}">
                                    @error('time')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-4 sm:col-span-2">                                            
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_id">
                                        Cliente
                                    </label>
                                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="client_id" id="client_id">
                                        <option disabled selected>Seleccione cliente:</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach                                        
                                    </select>     
                                    @error('client_id')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror                               
                                </div>
                                <div class="col-span-4 sm:col-span-2">                                            
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_id">
                                        Asignacion
                                    </label>
                                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="user_id" id="user_id">
                                        <option disabled selected>Seleccione un usuario:</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach                                        
                                    </select>     
                                    @error('user_id')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror                               
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" id="Agregar_turno" name="Agregar_turno"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Agregar turno
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-encabezado>      
