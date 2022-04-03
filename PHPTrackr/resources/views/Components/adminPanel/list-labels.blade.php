<table>
<tr>
    <th> 
        Id   
    </th>    
    <th> 
        Package   
    </th>   
    <th> 
        Shop   
    </th>
    <th>    
        Status
    </th>   
</tr>

@foreach ($data as $package)
<tr> 
    <td>{{ $package->id }}</td>
    <td>{{ $package->packageId }}</td>
    <td>{{ $package->shop }}</td>
    <td>{{ $package->status }}</td>
</tr>
@endforeach

</table>
