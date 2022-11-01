<x-admin-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex justify-start ">
                <a href="{{route('admin.roles.index')}}" class="px-4 py-2 bg-green-400 rounded-md">Cancel</a>
            </div>
            <div class="flex flex-col">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.roles.update',$role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Role name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $role->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                        </div>

                    </form>

                </div>

            </div>
            <div class="max-w-xl mt-6">
                <form  action="#">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="permission"
                               class="block text-sm font-medium text-gray-700">Permission</label>
                        <select id="permission" name="permission" autocomplete="permission-name"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-6 pt-5">
                <button type="submit"
                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
            </div>
            </form>
        </div>

        </div>

    </div>


</x-admin-layout>
