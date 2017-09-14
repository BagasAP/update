@extends('layouts.master')

@section('title')
	@lang('menu.title')
@endsection

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>@lang('menu.title')</h3>
  </div>

  <div class="title_right">
    <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input class="form-control" placeholder="@lang('label.search')" type="text" id="searchtext">
        <span class="input-group-btn">
          <button class="btn btn-primary btn-sm" type="button" onclick="on_search()">@lang('button.search')</button>
          <button class="btn btn-primary btn-sm" type="button" onclick="on_clear()">@lang('button.clear')</button>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<div class="x_title">
      			<div class="pull-left">
      				<small>@lang('label.setting') > @lang('menu.title')</small>
      			</div>
		        <div class="pull-right">
		        	<button class="btn btn-primary btn-sm" onclick="on_add()">@lang('button.add')</button>
		        	<button class="btn btn-primary btn-sm" onclick="on_edit()">@lang('button.edit')</button>
		        	<button class="btn btn-primary btn-sm" onclick="on_delete()">@lang('button.delete')</button>
		        </div>
        		<div class="clearfix"></div>
      		</div>
	      	<div class="x_content">
				<div class="table-responsive">
		        <table id="table-menu" class="table table-striped table-bordered jambo_table">
		        	<thead>
		        		<tr class="headings">
							<th>
                              <input type="checkbox" id="check-all">
                            </th>
                            <th>#</th>
			        		<th>@lang('menu.name')</th>
			        		<th>@lang('menu.parent')</th>
			        		<th>@lang('menu.class')</th>
			        		<th>@lang('menu.url')</th>
			        		<th>@lang('menu.user_group')</th>
			        	</tr>
		        	</thead>
					<tbody>
					</tbody>
		        </table>
				</div>
	    	</div>
		</div>
	</div>
</div>

<!-- Form Modal -->
<div class="modal fade in" tabindex="-1" role="dialog" id="modal-add-edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="form-add-edit" class="form-horizontal form-label-left" data-parsley-validate>
				<div class="panelt panel-default">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="panel-title" id="title">@lang('menu.add')</h3>
					</div>
					<input type="text" name="id" id="id" hidden="hidden">
					<div class="panel-body">
						<div class="clearfix">
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">@lang('menu.name') En<span class="text-danger">*</span></label>
									<input type="text" name="menu_en" class="form-control" placeholder="@lang('menu.name')" required="required">
									<span class="help-block"></span>
								</div>

								<div class="form-group">
									<label class="control-label">@lang('menu.name') Id<span class="text-danger">*</span></label>
									<input type="text" name="menu_id" class="form-control" placeholder="@lang('menu.name')" required="required">
									<span class="help-block"></span>
								</div>

								<div class="form-group">
									<label class="control-label">@lang('menu.parent')</label>
									<select name="parentid" class="select-2" data-placeholder="@lang('menu.parent')" data-allow-clear="true">
										@foreach ($parent as $data)
										<option value="{{ $data['id'] }}">{{ $data['text'] }}</option>
										@endforeach
									</select>
									<span class="help-block"></span>
								</div>
								<div class="form-group">
									<label class="control-label">@lang('menu.class') </label>
									<input type="text" name="class" class="form-control" placeholder="@lang('menu.class')">
								</div>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">@lang('menu.url') <span class="text-danger">*</span></label>
									<input type="text" name="url" class="form-control" placeholder="@lang('menu.url')" required="required">
									<span class="help-block"></span>
								</div>
								<div class="form-group">
									<label class="control-label">@lang('menu.user_group') <span class="text-danger">*</span></label>
									<select name="user_group[]" class="select-2" multiple="multiple" data-placeholder="@lang('menu.user_group')">
										@foreach ($role as $data)
										<option value="{{ $data['id'] }}">{{ $data['text'] }}</option>
										@endforeach
									</select>
									<span class="help-block"></span>
								</div>
								<div class="form-group">
									<label class="control-label">@lang('menu.order_number') <span class="text-danger">*</span></label>
									<input type="text" name="order_number" class="form-control number" placeholder="@lang('menu.order_number')" required="required">
									<span class="help-block"></span>
								</div>

							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btn-save" onclick="on_save()" class="btn btn-primary btn-sm">@lang('button.save')</button>
					<button type="button" data-dismiss="modal" class="btn btn-default btn-sm">@lang('button.cancel')</button>
				</div>
			</form>
		</div>
	</div>
</div> 

<!-- Modal for question -->
<div class="modal fade in" tabindex="-1" role="dialog" id="modal-delete-confirm">
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			  <h4 class="modal-title">@lang('label.confirmation')</h4>
		  </div>
		  <div class="modal-body">@lang('label.will_destroy')</div>
		  <div class="modal-footer">
			<button type="button" onclick="on_destroy()" id="btn-confirm" class="btn btn-primary btn-sm">@lang('button.yes')</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">@lang('button.no')</button>
		</div>
	  </div>
	</div>
</div>         
            
@endsection

@push('js')
	<script>
		var MENU_ADD 	= "@lang('menu.add')";
		var MENU_EDIT 	= "@lang('menu.edit')";
	</script>
	<script src="{{ url('assets/js/menus.js') }}"></script>
@endpush