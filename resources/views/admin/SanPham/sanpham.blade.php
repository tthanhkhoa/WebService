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
                    <th >Số lượng </th>

                    <th>Nhãn hiệu</th>
                    <th>Giá tiền</th>
                    <th>Status</th>

                    <th></th>
                </tr>
                </thead>

                <tbody id="rowSanPham" >
                @foreach($sanpham as $item)
                <tr id={{$item->id}}>
                    <td id='msp{{$item->id}}'>{{$item->id}}</td>
                    <td id='tsp{{$item->id}}'>{{$item->tensanpham}}</td>
                    <td id='sl{{$item->id}}'>{{$item->soluong}}</td>
                    <td id='nh{{$item->id}}'>{{$item->NhanHieu->tennhanhieu}}</td>
                    <td id='gt{{$item->id}}'>{{number_format($item->giatien)}}</td>
                    <td id='at{{$item->id}}'>{{$item->active == 1 ? 'Yes' : 'No'}}</td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a class="edit_sanpham green" id="edit{{$item->id}}" data-target="#AddModel" data-toggle="modal"
                               data-id="{{$item->id}}" data-tensanpham="{{$item->tensanpham}}" data-matheloai="{{$item->matheloai}}" data-soluong="{{$item->soluong}}"
                               data-manhanhieu="{{$item->manhanhieu}}" data-giatien="{{$item->giatien}}" data-active="{{$item->active}}" href="#">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>

                            <a class="delete_sanpham red" id="delete" data-target="#confirm_delete" data-toggle="modal" data-id="{{$item->id}}" href="#">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </a>
                            <a href="{{url('gallery',['masanpham'=>$item->id])}}"><i class="ace-icon glyphicon glyphicon-picture"></i></a>
                        </div>


                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-success" id="edit{{$item->id}}" data-target="#AddModel" data-toggle="modal"
                                        data-id="{{$item->id}}" data-tensanpham="{{$item->tensanpham}}" data-matheloai="{{$item->matheloai}}"
                                        data-soluong="{{$item->soluong}}"
                                        data-manhanhieu="{{$item->manhanhieu}}" data-giatien="{{$item->giatien}}" data-active="{{$item->active}}"
                                        data-rel="tooltip" title="Edit">
                                        <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="delete_sanpham tooltip-error" id="delete" data-target="#confirm_delete"
                                        data-toggle="modal" data-id="{{$item->id}}"
                                        data-rel="tooltip" title="Delete">
                                        <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('gallery',['masanpham'=>$item->id])}}"><i class="ace-icon glyphicon glyphicon-picture"></i></a>
                                        <span class="red">
                                        </span>
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
                                        <input id="masanpham" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::CL_MASANPHAM}}" placeholder="Mã sản phẩm " ng-model="currItem.name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Tên sản phẩm</label>
                                    <div class="col-lg-10">
                                        <input id="tensanpham" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::CL_TENSANPHAM}}" placeholder="Tên sản phẩm " ng-model="currItem.major">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Loại sản phẩm</label>
                                    <div class="col-lg-10">
                                        <select id="matheloai" class="form-control ng-pristine ng-untouched ng-valid"  name="{{App\Constant::CL_MATHELOAI}}">
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Số lượng</label>
                                    <div class="col-lg-10">
                                        <input id="soluong" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::CL_SOLUONG}}" placeholder="Số lượng" ng-model="currItem.major">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nhãn hiệu</label>
                                    <div class="col-lg-10">
                                        <select class="form-control ng-pristine ng-untouched ng-valid" id="manhanhieu" name="{{App\Constant::TBL_NHANHIEU}}">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Giá tiền</label>
                                    <div class="col-lg-10">
                                        <input id="giatien" type="text" class="form-control ng-pristine ng-untouched ng-valid" name="{{App\Constant::CL_GIATIEN}}" placeholder="Giá tiền" ng-model="currItem.major">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Active</label>
                                    <div class="col-lg-10">
                                        <input id="Active" type="radio" name="{{App\Constant::CL_ACTIVE}}" value="1"> Yes<br>
                                        <input id="Active" type="radio" name="{{App\Constant::CL_ACTIVE}}" value="0"> No<br>
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

    <div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <input type="hidden" name="row_id_del" id="row_id_del" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Xác nhận xoá  </h4>
                </div>

                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá sản phẩm này???</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                    <a id="delete_" class="btn btn-danger btn-ok">Đồng ý!!</a>
                </div>
            </div>
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/menu-left.js')}}" type="text/javascript"></script>
    <script>
        $( "#add_sanpham" ).click(function() {
            $(".modal-body").find("#masanpham,#tensanpham,#soluong,#manhanhieu,#giatien").val('').end();
            var $radios = $('input:radio[name=active]');
            $radios.filter('[value=1]').prop('checked', false);
            $radios.filter('[value=0]').prop('checked', false);
            getdata();
            $('#addSanpham').show();
            $('#editSanpham').hide();
        });


        $('#addSanpham').click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var masanpham = $('#masanpham').val();
            var tensanpham = $('#tensanpham').val();
            var matheloai = $('#matheloai').val();
            var soluong = $('#soluong').val();
            var nhanhieu = $('#manhanhieu').val();
            var giatien = $('#giatien').val();
            var active = $('#Active:checked').val();
            var url = "{!! route('addsanpham_api') !!}";
            $.ajax({
                'url':url,
                'data':{
                    '_token': _token,
                    'id':masanpham,
                    'tensanpham': tensanpham,
                    'matheloai': matheloai,
                    'soluong': soluong,
                    'manhanhieu': nhanhieu,
                    'giatien': giatien,
                    'active': active
                },
                'type':'POST',
                success: function(data){
                    console.log(data);
                    $('#AddModel').modal('hide');
                    if(data.result != 1){
                        var at;
                        var url_image = 'gallery/'+ data.result.id;
                        var price = formatNumber(data.result.giatien);
                        if(data.result.active == 1){
                            at = "Yes";
                        }
                        else{
                            at ="No";
                        }
                        var result = "<tr id='" + data.result.id + "'>";
                        result += "<td id='msp"+data.result.id+"'>"+data.result.id+"</td>";
                        result += "<td id='tsp"+data.result.id+"'>"+data.result.tensanpham+"</td>";
                        result += "<td id='sl"+data.result.id+"'>"+data.result.soluong+"</td>";
                        result += "<td id='nh"+data.result.id+"'>"+data.result.nhan_hieu.tennhanhieu+"</td>";
                        result += "<td id='gt"+data.result.id+"'>"+price+"</td>";
                        result += "<td id='at"+data.result.id+"'>"+at+"</td>";
                        result += "<td>";
                        result += "<div class=\"hidden-sm hidden-xs action-buttons\">";
                        result += "<a class=\"edit_sanpham green\" href=\"#\" id=\"edit"+data.result.id+"\" data-toggle=\"modal\"" +
                            " data-id='"+data.result.id+"' data-tensanpham='"+data.result.tensanpham+"' data-matheloai='"+data.result.matheloai+"' data-soluong='"+data.result.soluong+"'" +
                            "data-manhanhieu='"+data.result.manhanhieu+"' data-giatien='"+data.result.giatien+"' data-active='"+data.result.active+"' data-target=\"#AddModel\">";
                        result += "<i class=\"ace-icon fa fa-pencil bigger-130\"></i>";
                        result += "</a>";
                        result += "<a class=\"delete_sanpham red\" href=\"#\" id=\"delete\" data-target=\"#confirm_delete\"" +
                            "data-toggle=\"modal\" data-id='"+data.result.id+"' >";
                        result += "<i class=\"ace-icon fa fa-trash-o bigger-130\"></i>";
                        result += "</a>";
                        result += "<a href='"+url_image+"' ><i class=\"ace-icon glyphicon glyphicon-picture\"></i></a>";
                        result += "</div>";
                        result += "<div class=\"hidden-md hidden-lg\">";
                        result += "<div class=\"inline pos-rel\">";
                        result += "<button class=\"btn btn-minier btn-yellow dropdown-toggle\" data-toggle=\"dropdown\" data-position=\"auto\">";
                        result += "<i class=\"ace-icon fa fa-caret-down icon-only bigger-120\"></i>";
                        result += "</button>";
                        result += "<ul class=\"dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close\">";
                        result += "<li>";
                        result += "<a href=\"#\" class=\"edit_sanpham tooltip-success\" data-rel=\"tooltip\"id=\"edit"+data.result.id+"\" data-toggle=\"modal\"" +
                            "data-id='"+data.result.id+"' data-tensanpham='"+data.result.tensanpham+"' data-matheloai='"+data.result.matheloai+"' data-soluong='"+data.result.soluong+"'" +
                            "data-manhanhieu='"+data.result.manhanhieu+"' data-giatien='"+data.result.giatien+"' data-active='"+data.result.active+"' data-target=\"#AddModel\" title=\"Edit\">";
                        result += "<span class=\"green\">";
                        result += "<i class=\"ace-icon fa fa-pencil-square-o bigger-120\"></i>";
                        result += "</span>";
                        result += "</a>";
                        result += "</li>";
                        result += "<li>";
                        result += "<a href=\"#\" class=\"delete_sanpham tooltip-error\" data-rel=\"tooltip\" id=\"delete\" data-target=\"#confirm_delete\"" +
                            " data-toggle=\"modal\" data-id='"+data.result.id+"' title=\"Delete\">";
                        result += "<span class=\"red\">";
                        result += "<i class=\"ace-icon fa fa-trash-o bigger-120\"></i>";
                        result += "</span>";
                        result += "</a>";
                        result += "</li>";
                        result += "<li>";
                        result += "<a href='"+url_image+"' ><i class=\"ace-icon glyphicon glyphicon-picture\"></i></a>";
                        result += "</li>";
                        result += "</ul>";
                        result += "</div>";
                        result += "</div>";
                        result += "</td>";
                        result += "</tr>";
                        $("#rowSanPham").prepend(result);
                        iziToast.success({
                            title: 'Thông Báo',
                            message: 'Đã thêm sản phẩm thành công!',
                        });
                    }
                    else{
                        iziToast.error({
                            title: 'Thông báo',
                            message: 'Trong quá trình thêm sản phẩm đã xuất hiện lỗi.',
                        });
                    }



                }
            })
        });

        function formatNumber (num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }

        $('tbody#rowSanPham').on('click','.edit_sanpham',function(){
            $('#editSanpham').show();
            $('#addSanpham').hide();
            var masanpham = $(this).data('id');
            var tensanpham = $(this).data('tensanpham');
            var matheloai = $(this).data('matheloai');
            var soluong = $(this).data('soluong');
            var manhanhieu = $(this).data('manhanhieu');
            var giatien = $(this).data('giatien');
            var Active = $(this).data('active');
            getdata();
            if(Active == 1){
                var $radios = $('input:radio[name=active]');
                $radios.filter('[value=1]').prop('checked', true);

            }
            else{
                var $radios = $('input:radio[name=active]');
                $radios.filter('[value=0]').prop('checked', true);
            }
            var modal = $('#AddModel');
            modal.find("#masanpham").val(masanpham);
            modal.find("#tensanpham").val(tensanpham);
            modal.find("#matheloai").val(matheloai);
            modal.find("#soluong").val(soluong);
            modal.find("#manhanhieu").val(manhanhieu);
            modal.find("#giatien").val(giatien);
        });

        $('#editSanpham').click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var masanpham = $('#masanpham').val();
            var tensanpham = $('#tensanpham').val();
            var matheloai = $('#matheloai').val();
            var soluong = $('#soluong').val();
            var nhanhieu = $('#manhanhieu').val();
            var giatien = $('#giatien').val();
            var active = $('#Active:checked').val();
            var url = "{!! route('editsanpham_api') !!}";
            $.ajax({
                'url': url,
                'data':{
                    '_token': _token,
                    'id': masanpham,
                    'tensanpham': tensanpham,
                    'matheloai': matheloai,
                    'soluong': soluong,
                    'manhanhieu': nhanhieu,
                    'giatien': giatien,
                    'active': active
                },
                'type':'POST',
                success: function(data){
                    $('#AddModel').modal('hide');
                    if(data.result != 1){
                        $('#tsp' + masanpham).html(tensanpham);
                        $('#sl' + masanpham).html(soluong);
                        $('#nh' + masanpham).html(data.result.nhan_hieu.tennhanhieu);
                        $('#gt' + masanpham).html(giatien);
                        if(active == 1){
                            $('#at' + masanpham).html("Yes");
                        }
                        else{
                            $('#at' + masanpham).html("No");
                        }
                        var id_edit = 'edit' + masanpham;
                        var temp = document.getElementById(id_edit);
                        temp.setAttribute("data-tensanpham", tensanpham);
                        temp.setAttribute("data-matheloai", matheloai);
                        temp.setAttribute("data-soluong", soluong);
                        temp.setAttribute("data-nhanhieu", nhanhieu);
                        temp.setAttribute("data-giatien", giatien);
                        temp.setAttribute("data-active", active);
                        var content = temp.outerHTML;
                        temp.outerHTML = content;
                        iziToast.success({
                            title: 'Thông Báo',
                            message: 'Đã sửa sản phẩm thành công!',
                        });

                    }
                    else{
                        iziToast.error({
                            title: 'Thông báo',
                            message: 'Trong quá trình sửa sản phẩm đã xuất hiện lỗi.',
                        });
                    }


                }
            })
        });

        $('tbody#rowSanPham').on('click','.delete_sanpham',function(){
            var masanpham = $(this).data('id');
            $("#row_id_del").val( masanpham );
        });

        $('#delete_').click(function(e){
            var _token = $("input[name='_token']").val();
            var masanpham = $('#row_id_del').val();
            var url = "{!! route('deletesanpham') !!}";
            $.ajax({
                'url':url,
                'data':{
                    '_token': _token,
                    'id': masanpham
                },
                'type':'POST',
                success: function(data){
                    $('#confirm_delete').modal('hide');
                    if(data.result == 1){
                        $("#" +masanpham).remove();
                        iziToast.success({
                            title: 'Thông Báo',
                            message: 'Đã xóa sản phẩm thành công!',
                        });
                    }
                    else{
                        iziToast.error({
                            title: 'Thông báo',
                            message: 'Trong quá trình xóa sản phẩm đã xuất hiện lỗi.',
                        });
                    }


                }
            })
        });







        function getdata() {

            $('#matheloai')
                .empty();
            $.ajax({
                'url':'/api/danhsachtheloai_api',
                'type':'GET',
                success: function(data){
                    var t;
//                    console.log(data);
                    for(var key in data){
                        t = data[key];
                    }
                    t.forEach(function(entry) {
                        $('#matheloai')
                            .append($("<option></option>")
                                .attr("value",entry.id)
                                .text(entry.tentheloai));
                    });
                }
            });
            $('#manhanhieu')
                .empty();
            $.ajax({
                'url':'/api/danhsachncc_api',
                'type':'GET',
                success: function(data){
                    var t;
                    for(var key in data){
                        t = data[key];
                    }
                    t.forEach(function(entry) {
                        $('#manhanhieu')
                            .append($("<option></option>")
                                .attr("value",entry.id)
                                .text(entry.tennhanhieu));
                    });
                }
            })
        }




    </script>
@endsection


@section('menusanpham')
    open
@endsection

@section('componentsanpham')
    open
@endsection

