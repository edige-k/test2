<x-business-layout>
    <div class="py-9">

        <div class="max-w- mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow relative">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        My bank
                    </h3>
                </div>

                <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name Business</label>
                                <div  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" style="height: 38px">
                                {{Auth::user()->name}}
                                </div>
                            </div>



                            <div class="col-span-6 sm:col-span-3">
                                <label for="check" class="text-sm font-medium text-gray-900 block mb-2">Check</label>
                                <div  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" style="height: 38px">{{Auth::user()->check}}тг</div>

                            </div>


                            <div class="col-span-6 sm:col-span-4">
                                <label for="BIN" class="text-sm font-medium text-gray-900 block mb-2">BIN</label>
                                <div  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" style="height: 38px">{{Auth::user()->BIN}}</div>

                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="role_id" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                <div  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" style="height: 38px">
                                    @foreach($roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </div>

                            </div>
                            <div class="col-span-6 sm:col-span-3">

                                <x-input-label for="email" :value="__('Email')" />

                                <div  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" style="height: 38px">{{Auth::user()->email}}</div>


                            </div>


                        </div>

                    </div>
                <br>



            </div>
        </div>

    </div>

</x-business-layout>
