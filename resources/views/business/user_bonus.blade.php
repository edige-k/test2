<x-business-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                        <tr>

                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Full Name
                            </th>

                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Phone
                            </th>
                            <th scope="col" class="p-4">
                                Action
                            </th>
                        </tr>
                        </thead>
                        @foreach($users as $user)

                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <img class="h-10 w-10 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil Sims avatar">
                                    <div class="text-sm font-normal text-gray-500">
                                        <div class="text-base font-semibold text-gray-900">{{$user->surname}} {{$user->name}} {{$user->lastname}}</div>

                                    </div>
                                </td>
                                    <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$user->phone}}</td>

                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <div class="flex ">
                                        <a  href="{{route('business.get_send_bonus',$user->id)}}" type="button" data-modal-toggle="user-modal" class="mr-[20px] text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            send bouns
                                        </a>

                                    </div>
                                </td>

                            </tr>

                            </tbody>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-business-layout>
