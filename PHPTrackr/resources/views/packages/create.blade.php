<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Creating package</h3>
                    <form method="POST" action="{{ route('packageStore') }}" > 
                        @csrf
                        <table> 
                            <tr>    
                                <td>Personel information</td>
                            <tr> 
                                <td>Firstname*</td>  
                                <td><input type="text" name="firstname" required></td>  
                            </tr>
                            <tr> 
                                <td>Surname*</td>  
                                <td><input type="text" name="surname" required></td>  
                            </tr>
                            <tr> 
                                <td>Email*</td>  
                                <td><input type="text" name="email" required></td>  
                            </tr>
                            <tr> 
                                <td>Adress</td>  
                            </tr>
                            <tr> 
                                <td>City</td>  
                                <td><input type="text" name="city"></td>  
                            </tr>
                            <tr> 
                                <td>Street</td>  
                                <td><input type="text" name="street"></td>  
                            </tr>
                            <tr> 
                                <td>Housenumber</td>  
                                <td><input type="text" pattern="\d+[a-z]{0,1}" name="housenumber"> </td>  
                            </tr>
                            <tr>
                                <td>Webshop</td>
                                <td>                            
                                    <select name="status"  class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                                        @foreach($webshops as $webshop)
                                            <option value="{{ $webshop }}">{{ $webshop }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <button class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full" type="submit" value="Create">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
