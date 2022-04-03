<table>
<tr>
    <th> 
        Id   
    </th>    
    <th> 
        Firstname   
    </th>   
        <th> 
        Surname   
    </th>      
    <th> 
        Email   
    </th> 
    <th> 
        Action   
    </th>
</tr>

@foreach ($data as $package)
<tr> 
    <td>{{ $package->id }}</td>
    <td>{{ $package->firstname }}</td>
    <td>{{ $package->surname }}</td>
    <td>{{ $package->email }}</td>
    @if ($package->labelGenerated == false)
        <td><a href="/labels/create/{{ $package->id }}">Generate label</a></td>
    @endif
</tr>
@endforeach

</table>
 
