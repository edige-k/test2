<x-admin-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow relative">

        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">
                Add new client
            </h3>
        </div>

        <div class="p-6 space-y-6">
            <form method="POST" action="{{ route('admin.clients.store') }}">
            @csrf


                <div class="grid grid-cols-6 gap-6">


                    <div class="col-span-3 sm:col-span-2">
                        <label for="surname" class="text-sm font-medium text-gray-900 block mb-2">Surname</label>
                        <input type="text" name="surname" id="surname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"  required="">
                        @error('surname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror

                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                        <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="lastname" class="text-sm font-medium text-gray-900 block mb-2">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-6 sm:col-span-1">
                        <label for="role_id" class="text-sm font-medium text-gray-900 block mb-2">Role_Id</label>
                        <select type="number" name="role_id" id="role_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="2" required="">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-5">
                        <label for="balance" class="text-sm font-medium text-gray-900 block mb-2">Balance</label>
                        <input type="number" name="balance" id="balance" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="123456" required="">
                    </div>

                    <div class="col-span-6 sm:col-span-3">

                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="block mt-1 w-full shadow-sm bg-gray-50" type="email" name="email" :value="old('email')" required />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full shadow-sm bg-gray-50"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="phone" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                        <input type="phone" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. +(12)3456 789" required="">
                    </div>
                    <!-- Confirm Password -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full shadow-sm bg-gray-50"
                                      type="password"
                                      name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                </div>
                <div class="items-center p-6 border-t border-gray-200 rounded-b">
                    <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add client</button>
                </div>
            </form>
        </div>



    </div>
        </div>

    </div>


</x-admin-layout>
