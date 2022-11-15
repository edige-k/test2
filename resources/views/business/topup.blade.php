<x-business-layout>
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" flex justify-start ">

            <a href="{{route('business.index',Auth::user()->id )}}" class="px-4 py-2 bg-green-400 rounded-md">back</a>

        </div>
        <br>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex items-start justify-between p-5 border-b rounded-t">

                    <h3 class="text-xl font-semibold">
                        Пополнение баланса
                    </h3>
                </div>

                <div class="p-6 space-y-6">
                    <form method="POST" action="{{route('business.payment.store')}}">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="amount" class="text-sm font-medium text-gray-900 block mb-2">Amount</label>
                                <input type="number" name="amount" id="amount" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">

                                <label for="description" class="text-sm font-medium text-gray-900 block mb-2">description</label>
                                <input type="text" id="description" name="description" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />

                            </div>


                        </div>
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Пополнить счет</button>
                        </div>
                    </form></div>



            </div>
            <br>


        </div>

    </div></div>


    </x-business-layout>
