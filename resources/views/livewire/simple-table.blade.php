{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

{{--sm:-mx-6 lg:-mx-8  divide-y divide-gray-200--}}
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto ">
            <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden  sm:rounded-lg">
                    <x-jet-label class="m-auto">{{__('Mis Grupos')}}</x-jet-label>
                    <table class="table-border min-w-full ">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 table-header text-center text-xs leading-4 font-medium uppercase tracking-wider">
                                {{$name}}
{{--                                Name--}}
                            </th>
                            <th class="px-6 py-3 table-header text-center text-xs leading-4 font-medium uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-6 py-3 table-header text-center text-xs leading-4 font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 table-header text-center text-xs leading-4 font-medium uppercase tracking-wider">
                                Role
                            </th>
                            <th class="px-6 py-3 table-header text-center text-xs leading-4 font-medium uppercase tracking-wider">
                        </tr>
                        </thead>
                        <tbody class=" table-border bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            Jane Cooper
                                        </div>
                                        <div class="text-sm leading-5 text-gray-500">
                                            jane.cooper@example.com
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">Regional Paradigm Technician</div>
                                <div class="text-sm leading-5 text-gray-500">Optimization</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                Admin
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>

                        <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

