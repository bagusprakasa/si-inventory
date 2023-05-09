<tr id="removeTr" class="row-item" data-no="{{$no}}">
    @if ($no != 1)
        <td>
            <a href="javascript:void(0)" class="btn btn-danger text-white" onclick="removeTr({{$no}})"><i class="fas fa-trash"></i></a>
        </td>
    @else
        <td></td>
    @endif
    <td>
        <select name="barang[]" id="" class="form-control select2" style="width: 100%">
            <option value="">---Pilih Barang---</option>
            @foreach ($barangs as $b)
                <option value="{{$b->id}}">{{$b->name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="number" name="harga[]" class="form-control harga" id="harga{{$no}}" value="0" onkeyup="subtotal({{$no}})">
    </td>
    <td>
        <input type="number" name="qty[]" class="form-control qty" value="0" id="qty{{$no}}" onkeyup="subtotal({{$no}})">
    </td>
    <td>
        <input type="number" name="subtotal[]" class="form-control subtotal" id="subtotal{{$no}}" value="0" readonly>
    </td>
</tr>
