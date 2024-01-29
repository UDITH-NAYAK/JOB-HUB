<x-layout>
 
 
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Job Post
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($jobs->isEmpty())
                    @foreach ($jobs as $item)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/jobs/{{ $item->id }}">
                                    {{ $item->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/job/edit/{{ $item->id }}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action='{{route('confirm-alert')}}'>
                                        @csrf
                                        
                                        <input type="hidden" name="job_id" value="{{$item->id}}">
                                        <button class="text-red-600"
                                        type="submit">
                                            <i class="fa-solid fa-trash-can"
                                            ></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">You have'nt Posted Yet</p>
                            <p class="text-center">Get start by Posting 
                                <a href="/job/create" class="link underline c">Upload a post</a>
                             </p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </div>
</x-layout>
