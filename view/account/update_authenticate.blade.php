@section('title')
认证
@endsection

@extends('pcview::layouts.default')

@section('styles')
<link rel="stylesheet" href="{{ asset('zhiyicx/plus-component-pc/css/account.css')}}"/>
@endsection

@section('content')
<div class="account_container">

    @include('pcview::account.sidebar')

    <div class="account_r">
        <div class="account_c_c">
            <div class="account_tab" id="J-authenticate">
                <div class="perfect_title">
                    @if ($info->certification_name == 'user')
                        <span>个人认证</span>
                    @else
                        <span>机构认证</span>
                    @endif
                    <input id="authtype" name="type" type="hidden" value="{{$info['certification_name']}}" />
                </div>
                @if ($info->certification_name == 'user')
                {{-- 个人认证 --}}
                <div class="user_authenticate">
                    <div class="account_form_row">
                        <label class="w80 required" for="realName"><font color="red">*</font>真实姓名</label>
                        <input id="realName" name="name" type="text" value="{{$info['data']['name'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="IDNumber"><font color="red">*</font>身份证号码</label>
                        <input  id="IDNumber" name="number" type="text" value="{{$info['data']['number'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="contact"><font color="red">*</font>联系方式</label>
                        <input id="contact" name="phone" type="text" value="{{$info['data']['phone'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="desc"><font color="red">*</font>认证描述</label>
                        <div class="text_box desc" contenteditable="true">{{$info['data']['desc'] or ''}}</div>
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="desc"><font color="red">*</font>认证资料</label>
                        <div class="upload_file">
                            <span class="file_box">
                            @if (isset($info['data']['files'][0]))
                                <img id="J-image-preview-front" src="{{$routes['storage'].$info['data']['files'][0]}}" />
                            @else
                                <img id="J-image-preview-front" src="{{asset('zhiyicx/plus-component-pc/images/upload_zm.png')}}" />
                            @endif
                                <input class="J-file-upload front" type="file" name="file-front" />
                            </span>
                            <span  class="file_box">
                            @if (isset($info['data']['files'][1]))
                                <img id="J-image-preview-behind" src="{{$routes['storage'].$info['data']['files'][1]}}" />
                            @else
                                <img id="J-image-preview-behind" src="{{asset('zhiyicx/plus-component-pc/images/upload_fm.png')}}" />
                            @endif
                                <input class="J-file-upload behind" type="file" name="file-behind" />
                            </span>
                        </div>
                        <input name="front_id" id="front_id" type="hidden" value="{{$info['data']['files'][0] or ''}}" />
                        <input name="behind_id" id="behind_id" type="hidden" value="{{$info['data']['files'][1] or ''}}"/>
                    </div>
                    <div class="account_form_row">
                        <div class="cer_format">附件格式：gif, jpg, jpeg, png;附件大小：不超过10M</div>
                    </div>
                    <div class="perfect_btns">
                        <a class="perfect_btn save J-authenticate-btn" href="javascript:;">保存</a>
                    </div>
                </div>
                @else
                {{-- 机构认证 --}}
                <div class="org_authenticate">
                    <div class="account_form_row">
                        <label class="w80 required" for="orgName"><font color="red">*</font>机构名称</label>
                        <input id="orgName" name="org_name" type="text" value="{{$info['data']['org_name'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="orgAddress"><font color="red">*</font>机构地址</label>
                        <input  id="orgAddress" name="org_address" type="text" value="{{$info['data']['org_address'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="ruler"><font color="red">*</font>负责人</label>
                        <input  id="ruler" name="name" type="text" value="{{$info['data']['name'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="rulerPhone"><font color="red">*</font>负责人电话</label>
                        <input id="rulerPhone" name="phone" type="text" value="{{$info['data']['phone'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="license"><font color="red">*</font>营业执照号</label>
                        <input  id="license" name="number" type="text" value="{{$info['data']['number'] or ''}}">
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="desc"><font color="red">*</font>认证描述</label>
                        <div class="text_box desc" contenteditable="true">{{$info['data']['desc'] or ''}}</div>
                    </div>
                    <div class="account_form_row">
                        <label class="w80 required" for="desc"><font color="red">*</font>认证资料</label>
                        <div class="upload_file">
                            <span class="file_box">
                            @if (isset($info['data']['files'][0]))
                                <img id="J-image-preview" src="{{$routes['storage'].$info['data']['files'][0]}}" />
                            @else
                                <img id="J-image-preview" src="{{ asset('zhiyicx/plus-component-pc/images/pic_upload.png')}}" />
                            @endif
                                <input class="J-file-upload org" type="file" name="file-front" />
                            </span>
                        </div>
                        <input name="license_id" id="license_id" type="hidden" value="{{$info['data']['files'][0] or ''}}" />
                    </div>
                    <div class="perfect_btns">
                        <a class="perfect_btn save J-authenticate-btn" href="javascript:;">保存</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('zhiyicx/plus-component-pc/js/module.account.js')}}"></script>
<script src="{{ asset('zhiyicx/plus-component-pc/js/md5.min.js')}}"></script>
<script>
/*  提交用户认证信息*/
$('.J-authenticate-btn').on('click', function(e) {
    var getArgs = function() {
        var inp = $('#J-authenticate input, #J-authenticate select').toArray();
        var sel;
        for (var i in inp) {
            sel = $(inp[i]);
            args.set(sel.attr('name'), sel.val());
        };
        args.set('desc', $('.text_box').text());

        return args.get();
    };
    if (getArgs().type == 'user') {
        var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
        if(reg.test(getArgs().number) === false)
        {
           alert("身份证输入不合法");
           return  false;
        }
        getArgs().files = [getArgs().front_id, getArgs().behind_id];
    }

    if (getArgs().type == 'org') {
        getArgs().files = [getArgs().license_id];
    }
    $.ajax({
        url: '/api/v2/user/certification',
        type: 'PATCH',
        data: getArgs(),
        dataType: 'json',
        success: function(res, data, xml) {
            if (xml.status ===  201) {
                noticebox(res.message, 1, '/account/authenticate');
            }
        },
        error: function(xhr){
            showError(xhr.responseJSON);
        }
    });
});

$('.J-file-upload').on('change', function(e){
    var file = e.target.files[0];
    if ($(this).hasClass('org')) {
        fileUpload.init(file, function(image, f, file_id){
            $('#license_id').val(file_id);
            $('#J-image-preview').attr('src', image.src);
        });
    }
    if ($(this).hasClass('front')) {
        fileUpload.init(file, function(image, f, file_id){
            $('#front_id').val(file_id);
            $('#J-image-preview-front').attr('src', image.src);
            });
    }
    if ($(this).hasClass('behind')) {
        fileUpload.init(file, function(image, f, file_id){
            $('#behind_id').val(file_id);
            $('#J-image-preview-behind').attr('src', image.src);
        });
    }
});
</script>
@endsection