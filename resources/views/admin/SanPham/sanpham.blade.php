@extends('admin.header')

@section('sanpham')
    {{--<div class="row">--}}
    <div class="col-xs-12">

        <div class="table-header">
            Danh sách Sản phẩm
        </div>
        <a class="add_sanpham blue" id="add_sanpham" data-target="#AddModel" data-toggle="modal"  href="#" style="float: right;">
            <i class="ace-icon glyphicon glyphicon-plus"></i> Thêm thể loại
        </a>
        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>

                    <th>Mã sản phẩm </th>
                    <th>Tên sản phẩm </th>
                    <th class="hidden-480">Số lượng </th>

                    <th>Nhãn hiệu</th>
                    <th>Giá tiền</th>
                    <th class="hidden-480">Status</th>

                    <th></th>
                </tr>
                </thead>

                <tbody id="rowSanPham" >
                @foreach($sanpham as $item)
                <tr id={{$item->maSanPham}}>
                    <td id='msp{{$item->maSanPham}}'>{{$item->maSanPham}}</td>
                    <td id='tsp{{$item->maSanPham}}'>{{$item->tenSanPham}}</td>
                    <td id='sl{{$item->maSanPham}}'>{{$item->soLuong}}</td>
                    <td id='nh{{$item->maSanPham}}'>{{$item->NhanHieu->tenNhanHieu}}</td>
                    <td id='gt{{$item->maSanPham}}'>{{number_format($item->GiaTien)}}</td>
                    <td id='at{{$item->maSanPham}}'>{{$item->Active == 1 ? 'Yes' : 'No'}}</td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">


                            <a class="green" href="#">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>

                            <a class="red" href="#">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </a>
                        </div>

                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">


                                    <li>
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
            <div class="pull-right" > {!! $sanpham->links() !!} </div>
        </div>
    </div>
    {{--</div>--}}

    {{--Modal Add San Pham--}}
    <div class="modal fade ng-scope" id="AddModel" role="modal" style="display: none;" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">×</span></button>
                    <h4 class="modal-title">Thêm Thể Loại</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form id="registrationForm"  class="form-horizontal ng-pristine ng-valid">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mã sản phẩm</label>
                                    <div class="col-lg-10">
                                        <input id="maSanPham" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::TBL_maSanPham}}" placeholder="Mã sản phẩm " ng-model="currItem.name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Tên sản phẩm</label>
                                    <div class="col-lg-10">
                                        <input id="tenSanPham" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::TBL_tenSanPham}}" placeholder="Tên sản phẩm " ng-model="currItem.major">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Loại sản phẩm</label>
                                    <div class="col-lg-10">
                                        <select class="form-control ng-pristine ng-untouched ng-valid" id="tenTheLoai" name="{{App\Constant::TBL_MaTheLoai}}">
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Số lượng</label>
                                    <div class="col-lg-10">
                                        <input id="soLuong" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::TBL_soLuong}}" placeholder="Số lượng" ng-model="currItem.major">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nhãn hiệu</label>
                                    <div class="col-lg-10">
                                        {{--<input id="nhanHieu" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::TBL_NhanHieu}}" placeholder="Nhãn hiệu" ng-model="currItem.major">--}}
                                        <select class="form-control ng-pristine ng-untouched ng-valid" id="nhanHieu" name="{{App\Constant::TBL_NhanHieu}}">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Giá tiền</label>
                                    <div class="col-lg-10">
                                        <input id="giaTien" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::TBL_GiaTien}}" placeholder="Giá tiền" ng-model="currItem.major">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Active</label>
                                    <div class="col-lg-10">
                                        <input id="Active" type="radio" name="{{App\Constant::TBL_Active}}" value="1"> Yes<br>
                                        <input id="Active" type="radio" name="{{App\Constant::TBL_Active}}" value="0"> No<br>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="addSanpham" type="button "  class="btn btn-primary" >Save changes</button>
                                    <button id="editSanpham" type="button "   class="btn btn-primary" >Save changes</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div></div></div>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        window.onload = function(){
            $("#sub_id_sanpham").empty();
            $.ajax({
                'url':'/api/danhsachtheloai_api',
                'type':'GET',
                success: function(data){

                    var result = "<li class=>";
                    result += "<a href=\"\\tatcasanpham\">";
                    result += "<i class=\"menu-icon fa fa-caret-right\"></i>";
                    result += "Tất cả";
                    result += "</a>";
                    result += "<b class=\"arrow\"></b>";
                    result += "</li>";
                    var t;
                    for(var key in data){
                        t = data[key];
                    }
                    t.forEach(function(entry) {
                        var codeTheLoai = entry.maTheLoai;
                        var temp = '\\getSanPhamById\\'+codeTheLoai;
                        result += "<li class=>";
                        result += "<a href= "+temp+" >";
                        result += "<i class=\"menu-icon fa fa-caret-right\"></i>";
                        result += ""+entry.tenTheLoai+"";
                        result += "</a>";
                        result += "<b class=\"arrow\"></b>";
                        result += "</li>";

                    });
                    $("#sub_id_sanpham").append(result);
                    $("#flag").val(1);
                }
            })
        };
        $( "#add_sanpham" ).click(function() {
            $(".modal-body").find("#maTheLoai,#tenTheLoai").val('').end();
            var $radios = $('input:radio[name=Active]');
            $radios.filter('[value=1]').prop('checked', false);
            $radios.filter('[value=0]').prop('checked', false);
            $.ajax({
                'url':'/api/danhsachtheloai_api',
                'type':'GET',
                success: function(data){
                    var t;
                    for(var key in data){
                        t = data[key];
                    }
                    t.forEach(function(entry) {
                        $('#tenTheLoai')
                            .append($("<option></option>")
                                .attr("value",entry.maTheLoai)
                                .text(entry.tenTheLoai));
                    });
                }
            });
            $.ajax({
                'url':'/api/danhsachncc_api',
                'type':'GET',
                success: function(data){
                    var t;
                    for(var key in data){
                        t = data[key];
                    }
                    t.forEach(function(entry) {
                        $('#nhanHieu')
                            .append($("<option></option>")
                                .attr("value",entry.idNhanHieu)
                                .text(entry.tenNhanHieu));
                    });
                }
            })
            $('#addSanpham').show();
            $('#editSanpham').hide();
        });


        $('#addSanpham').click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var maSanPham = $('#maSanPham').val();
            var tenSanPham = $('#tenSanPham').val();
            var maTheLoai = $('#tenTheLoai').val();
            var soLuong = $('#soLuong').val();
            var nhanHieu = $('#nhanHieu').val();
            var giaTien = $('#giaTien').val();
            var Active = $('#Active:checked').val();
            $.ajax({
                'url':'api/addsanpham_api',
                'data':{
                    '_token': _token,
                    'maSanPham': maSanPham,
                    'tenSanPham': tenSanPham,
                    'maTheLoai': maTheLoai,
                    'soLuong': soLuong,
                    'idNhanHieu': nhanHieu,
                    'GiaTien': giaTien,
                    'Active': Active
                },
                'type':'POST',
                success: function(data){
                    console.log(data);
                    return
                    $('#AddModel').modal('hide');
                    if(data){
                        var result = "<tr id='" + data.result.maSanPham + "'>";
                        result += "<td id='msp"+data.result.maSanPham+"'>"+data.result.maSanPham+"</td>";
                        result += "<td id='tsp"+data.result.maSanPham+"'>"+data.result.tenSanPham+"</td>";
                        result += "<td id='sl"+data.result.maSanPham+"'>"+data.result.soLuong+"</td>";
                        result += "<td id='nh"+data.result.maSanPham+"'>"+data.result.maTheLoai+"</td>";
                        result += "<td id='gt"+data.result.maSanPham+"'>"+data.result.maTheLoai+"</td>";
                        result += "<td id='at"+data.result.maSanPham+"'>"+data.result.maTheLoai+"</td>";
                        result += "<td>";
                        result += "<div class=\"hidden-sm hidden-xs action-buttons\">";
                        result += "<a class=\"green\" href=\"#\">";
                        result += "<i class=\"ace-icon fa fa-pencil bigger-130\"></i>";
                        result += "</a>";
                        result += "<a class=\"red\" href=\"#\">";
                        result += "<i class=\"ace-icon fa fa-trash-o bigger-130\"></i>";
                        result += "</a>";
                        result += "</div>";
                        result += "<div class=\"hidden-md hidden-lg\">";
                        result += "<div class=\"inline pos-rel\">";
                        result += "<button class=\"btn btn-minier btn-yellow dropdown-toggle\" data-toggle=\"dropdown\" data-position=\"auto\">";
                        result += "<i class=\"ace-icon fa fa-caret-down icon-only bigger-120\"></i>";
                        result += "</button>";
                        result += "<ul class=\"dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close\">";
                        result += "<li>";
                        result += "<a href=\"#\" class=\"tooltip-success\" data-rel=\"tooltip\" title=\"Edit\">";
                        result += "<span class=\"green\">";
                        result += "<i class=\"ace-icon fa fa-pencil-square-o bigger-120\"></i>";
                        result += "</span>";
                        result += "</a>";
                        result += "</li>";
                        result += "<li>";
                        result += "<a href=\"#\" class=\"tooltip-error\" data-rel=\"tooltip\" title=\"Delete\">";
                        result += "<span class=\"red\">";
                        result += "<i class=\"ace-icon fa fa-trash-o bigger-120\"></i>";
                        result += "</span>";
                        result += "</a>";
                        result += "</li>";
                        result += "</ul>";
                        result += "</div>";
                        result += "</div>";
                        result += "</td>";
                        result += "</tr>";
                        $("#rowSanPham").prepend(result);
                    }



                }
            })
        });




    </script>
@endsection


@section('menusanpham')
    open
@endsection

@section('componentsanpham')
    open
@endsection

