<h1>Amazon</h1>
<table border="1">
    <th>ID</th><th>Link Produto</th><th>Atualização</th>
    @foreach ($dados as $produto)
    <tr>
        <td>{{$produto['id']}}</td>
        <td>{{$produto['link']}}</td>
        <td>{{$produto['preco']}}</td>
        <td>{{$produto['updated_at']}}</td>
    </tr>
    @endforeach
</table>