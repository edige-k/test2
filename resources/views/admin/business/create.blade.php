<x-admin-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow relative">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Add new business
                    </h3>
                </div>

                <div class="p-6 space-y-6">
                    <form method="POST" action="{{ route('admin.businesses.store') }}">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name Business</label>
                                <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="check" class="text-sm font-medium text-gray-900 block mb-2">Check</label>
                                <input type="number" name="check" id="check" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                            </div>


                            <div class="col-span-6 sm:col-span-4">
                                <label for="BIN" class="text-sm font-medium text-gray-900 block mb-2">BIN</label>
                                <input type="text" name="BIN" id="BIN" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="role_id" class="text-sm font-medium text-gray-900 block mb-2">Role_Id</label>
                                <select type="number" name="role_id" id="role_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="2" required="">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
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
                            <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add business</button>
                        </div>
                    </form></div>



            </div>
        </div>

    </div>


</x-admin-layout>
