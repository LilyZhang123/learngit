@extends('layouts.main')
@section('content')
<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<!-- 商家详情 -->
<div class="row" id="form">
	<div class="col-lg-12">
		<div class="ibox ">
			<div class="ibox-title">
				<ol class="breadcrumb">
					<li>
						<a href="/">首页</a>
					</li>
					<li></li>
					<li class="active"> <strong>提交申请</strong>
					</li>
				</ol>
			</div>
			<h2 class="m-b-lg">申请资料</h2>
			<div class="row">
				<div class="table-responsive text-center col-md-12" style="padding: 0px">
					<table class="table table-striped table-bordered table-hover dataTables-example dataTable">
						<thead>
							<tr class="success">
								<th class="text-center">申请编号</th>
								<th class="text-center">申请时间</th>
								<th class="text-center">授信状态</th>
								<th class="text-center">提交人</th>
								<th class="text-center">公司名称</th>
								<th class="text-center">申请额度（万元）</th>
								<th class="text-center">信息来源</th>
							</tr>
						</thead>
						<tbody class="intent-tbody">
							<tr>
								<td class="text-center" name="id"></td>
								<!-- 申请编号 -->
								<td class="text-center" name="submit_time_cn"></td>
								<!-- 申请时间 -->
								<td class="text-center" name="status_cn"></td>
								<!-- 授信状态 -->
								<td class="text-center" name="name"></td>
								<!-- 授信状态 -->
								<td class="text-center" name="company_name"></td>
								<!-- 公司名称 -->
								<td class="text-center" name="amount"></td>
								<!-- 申请额度（万元） -->
								<td class="text-center" name="info_origin"></td>
								<!-- 信息来源 -->
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div id="insert-area" class="ibox-content">
				<div class="row">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#home" role="tab" data-toggle="tab">基本资料</a>
						</li>
						<li role="presentation">
							<a href="#profile" role="tab" data-toggle="tab">征信资料</a>
						</li>
						<li role="presentation">
							<a href="#eContract" role="tab" data-toggle="tab">电子合同</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<div class="row">
								<div class="col-sm-12">
									<form class="form-horizontal">
										<div class="form-group m-t">
											<label class="col-sm-2 control-label h4">基本资料</label>
										</div>
										<div class="form-group">

											<label class="col-sm-2 control-label">公司名称：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" value="" name="company_name" data-line="newbase">
												<input type="hidden" name="company_id">
												</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">角色：</label>

											<div class="col-sm-3">
												<select class="form-control form-margin" name="is_corp" data-line='newbase'>
													<option value="1" >法人</option>
													<option value="0" >被授权人</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">姓名：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" name="name"  value="" data-line="newbase"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">身份证号码：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" name="user_id_card"  value=""  data-line="newbase"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">手机号码：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  value="" name="mobile" data-line="newbase"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">营业执照原件：</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="business_license-btn">上传</a>
												<input type="hidden" value="" id="business_license" name="business_license" data-type="1" />
											</div>
											<div id="business_license-img" class="col-sm-3"></div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">法人代表手持身份证：</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="hand_idcard-btn">上传</a>
												<input type="hidden" value="" id="hand_idcard" name="hand_idcard" data-type="2" />

											</div>
											<div id="hand_idcard-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">法人代表身份证正面：</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="idcard_front-btn">上传</a>
												<input type="hidden" value="" id="idcard_front" name="idcard_front" data-type="3" />

											</div>
											<div id="idcard_front-img" class="col-sm-3"></div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">法人代表身份证反面：</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="idcard_back-btn">上传</a>
												<input type="hidden" value="" id="idcard_back" name="idcard_back" data-type="4" />
											</div>
											<div id="idcard_back-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">授权人身份证正面：</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="autho_idcard_front-btn">上传</a>
												<input type="hidden" value="" id="autho_idcard_front" name="autho_idcard_front" data-type="5" />
											</div>
											<div id="autho_idcard_front-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">授权人身份证反面：</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="autho_idcard_back-btn">上传</a>
												<input type="hidden" value="" id="autho_idcard_back" name="autho_idcard_back" data-type="6" />
											</div>
											<div id="autho_idcard_back-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												授权书
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="authorization-btn">上传</a>
												<input type="hidden" value="" id="authorization" name="authorization" data-type="7" />
											</div>
											<div id="authorization-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">门店照片</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="shop_picture-btn">上传</a>
												<input type="hidden" value="" id="shop_picture" name="shop_picture" data-type="10"/>
											</div>
											<div id="shop_picture-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												房产证或租赁合同（可选）
												<span style="color:red">*</span>
											</label>
											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="house_contract-btn">上传</a>
												<input type="hidden" value="" id="house_contract" name="house_contract" data-type="8"/>
											</div>
											<div id="house_contract-img" class="col-sm-3"></div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<form class="form-horizontal">
										<div class="form-group m-t">
											<label class="col-sm-2 control-label h4">公司信息：</label>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">公司名称：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" value="" disabled="disabled"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												成立时间：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control data" id="date-pick" data-line="base"  value="" name="establish_time"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												法定代表人：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input  type="text" class="form-control" data-line="base"  value="" name="law_person"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												法定代表人身份证号码：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input  type="text" class="form-control"  data-line="base"  value="" name="id_card"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												营业执照编号：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  data-line="base"  value="" name="license"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												手机号码：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" data-line="base"  value="" name="mobile"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												经营范围：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  data-line="base"  value="" name="manage_range"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												经营地址：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  data-line="base"  value="" name="manage_addr"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												联系人姓名：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  data-line="base" value="" name="contacts"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												联系人电话：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control"  data-line="base"  value="" name="contacts_tel"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">股东：</label>

											<div class="col-lg-5 col-sm-8">
												<div class="table-responsive text-center" style="padding: 0px">
													<table class="table table-striped table-bordered table-hover dataTables-example dataTable">
														<thead>
															<tr class="success">
																<th class="text-center">姓名</th>
																<th class="text-center">证件号</th>
																<th class="text-center">出资（万元）</th>
																<th class="text-center">占比（%）</th>
																<th class="text-center">备注</th>
																<th class="text-center">操作</th>
															</tr>
														</thead>
														<tbody class="intent-tbody" id="shareholder"></tbody>
													</table>
												</div>
											</div>
											<div class="col-sm-2">
												<button type="button" class="addShareholder-btn btn btn-info" data-toggle="modal" data-target=".addShareholder-area">增加股东</button>
											</div>

										</div>

									</form>
								</div>
							</div>
						</div>
						<!-- 基本资料部分 end -->
						<div role="tabpanel" class="tab-pane" id="profile">
							<div class="row">
								<div class="col-sm-12">
									<form class="form-horizontal">
										<div class="form-group m-t">
											<label class="col-sm-2 control-label h4">征信资料</label>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">鹏元：</label>
											<div class="col-sm-3"></div>
											<div id="pengyuan-img" class="col-sm-3"></div>

										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">企信宝：</label>

											<div class="col-sm-3"></div>
											<div id="qixin-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">其它征信：</label>

											<div class="col-sm-3"></div>
											<div id="other_credit-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												主体资格：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" data-line="credit"  value="" name="qualification" disabled="disabled"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">主体信用：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" data-line="credit"  value="" name="credit" disabled="disabled"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">经营真实性：</label>

											<div class="col-sm-3">
												<input type="text" class="form-control" data-line="credit"   value="" name="manage_authenticity" disabled="disabled"></div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group m-t">
										<label class="col-sm-2 control-label h4">授信额度</label>
									</div>
									<div class="table-responsive text-center col-md-12" style="padding: 0px">
										<table class="table table-striped table-bordered table-hover dataTables-example dataTable">
											<thead>
												<tr>
													<th>#</th>
													<th>垫款发车额度(万元)</th>
													<th>库存融资额度</th>

												</tr>
											</thead>
											<tbody class="intent-tbody">
												<tr>
													<td>风控初审建议授信额度</td>
													<td>
														<input type="text" class="form-control" name="first_trial" data-line="base" value="" disabled="disabled"></td>
													<td></td>

												</tr>
												<tr>
													<td>风控复审授信额度</td>
													<td>
														<input type="text" class="form-control" name="recheck" data-line="base" value="" disabled="disabled"></td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- 征信资料 end-->
						<div role="tabpanel" class="tab-pane" id="eContract">
							<div class="row">
								<div class="col-sm-12">
									<form class="form-horizontal">
										<div class="form-group m-t">
											<label class="col-sm-2 h4">电子合同／单件</label>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												汽车代购服务框架合同
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="car_contract-btn">上传</a>
												<input type="hidden" value="" id="car_contract" name="car_contract" data-type="14"/>

											</div>
											<div id="car_contract-img" class="col-sm-3"></div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">
												担保合同（适用自然人）：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="nature_sponsoring_state-btn">上传</a>
												<input type="hidden" value="" id="nature_sponsoring_state" name="nature_sponsoring_state" data-type="15"/>
											</div>
											<div id="nature_sponsoring_state-img" class="col-sm-3"></div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">
												担保合同（适用对公）：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="business_sponsoring_state-btn">上传</a>
												<input type="hidden" value="" id="business_sponsoring_state" name="business_sponsoring_state" data-type="16"/>
											</div>
											<div id="business_sponsoring_state-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												委托代购合同：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="contracts_on_behalf-btn">上传</a>
												<input type="hidden" value="" id="contracts_on_behalf" name="contracts_on_behalf" data-type="17"/>

											</div>
											<div id="contracts_on_behalf-img" class="col-sm-3"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">
												商品车运输服务合同：
												<span style="color:red">*</span>
											</label>

											<div class="col-sm-3">
												<a class="btn btn-outline btn-info" id="serve_cobtracts-btn">上传</a>
												<input type="hidden" value="" id="serve_cobtracts" name="serve_cobtracts" data-type="19"/>
											</div>
											<div id="serve_cobtracts-img" class="col-sm-3"></div>
										</div>

									</form>
								</div>
							</div>
						</div>
						<!-- 电子合同 END-->
					</div>
				</div>

				<div class="modal fade modifyShareholder-area" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modifyShareholder-area">
					<div class="modal-dialog modal-lg">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">股东</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" name="">
									<input type="hidden" data-name="id" >
									<div class="form-group">
										<label class="col-sm-3 control-label">姓名:</label>

										<div class="col-sm-3">
											<input type="text" data-name="name" name="name" class="form-control"></div>

									</div>
									<div class="form-group ">
										<label class="col-sm-3 control-label">证件号:</label>

										<div class="col-sm-3">
											<input type="text" data-name="id_card" name="id_card"  class="form-control"></div>
									</div>
									<div class="form-group ">
										<label class="col-sm-3 control-label">出资:</label>

										<div class="col-sm-3">
											<input type="text" data-name="funding" name="funding"  class="form-control">万元</div>
									</div>
									<div class="form-group ">
										<label class="col-sm-3 control-label">占比:</label>

										<div class="col-sm-3">
											<input type="text" data-name="percentage" name="percentage"  class="form-control">%</div>
									</div>
									<div class="form-group ">
										<label class="col-sm-3 control-label">备注:</label>

										<div class="col-sm-3">
											<input type="text" data-name="remark" name="remark"  class="form-control"></div>
									</div>
									<div class="form-group ">
										<div class="col-sm-3 col-sm-offset-2">
											<button class="btn btn-info shareholder-modify-btn" type="button" >保存</button>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer text-center">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="ibox-title" id="handle">
				<div class="row">
					<div class="col-sm-3 text-center">
						<button class="btn btn-primary save-all-btn"  data-toggle="modal"
                                                                       
                                                                        data-target="#addRecords">保存</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="addRecords" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">添加备注</h4>
					</div>
					<div class="modal-body">
						<textarea class="form-control input-sm input" placeholder="请输入要添加备注" name="recordContent"
                                  id="recordContent"></textarea>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="" id="orderId" name="orderId">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="button" class="btn btn-primary confirm-records">确定</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade addShareholder-area" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addShareholder-area">
	<div class="modal-dialog modal-lg">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">股东</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="">
					<input type="hidden" data-name="id" >
					<div class="form-group">
						<label class="col-sm-3 control-label">姓名:</label>

						<div class="col-sm-3">
							<input type="text" name="name" class="form-control"></div>

					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">证件号:</label>

						<div class="col-sm-3">
							<input type="text" name="id_number"  class="form-control"></div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">出资:</label>

						<div class="col-sm-3">
							<input type="text" name="funding"  class="form-control">万元</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">占比:</label>

						<div class="col-sm-3">
							<input type="text" name="percentage"  class="form-control">%</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 control-label">备注:</label>

						<div class="col-sm-3">
							<input type="text" name="remark"  class="form-control"></div>
					</div>
					<div class="form-group ">
						<div class="col-sm-3 col-sm-offset-2">
							<button class="btn btn-info save-Shareholder-btn" type="button" >保存</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<script src="/js/plugins/plupload/plupload.full.min.js"></script>
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  var listUrl = "{{ url('apiFinance/financeCompany/basicInfo') }}";// 基本资料
  var saveUrl = "{{ url('apiFinance/financeCompany/save') }}";// 保存
  var getCompanyUrl = "{{ url('/apiFinance/financeCompany/getCompany') }}";// 获取公司
  var uploaderUrl = "{{ url('apiFinance/financeCompany/upload') }}";// 上传文件

  var Token = "{{ csrf_token() }}";
  seajs.use('../../1v/app/finance/dataBindDetail/dataBindDetail.js', function (insure) {
      insure.init();
  });
</script>
@endsection