@extends('layouts.master')

@section('title')
	@lang('system.title')
@endsection

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>@lang('system.title')</h3>
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
      				<small>Master > @lang('system.title')</small>
      			</div>
		        <div class="pull-right">
		        	<button class="btn btn-primary btn-sm" onclick="on_add()">@lang('button.add')</button>
		        	<button class="btn btn-primary btn-sm" onclick="on_show_edit()">@lang('button.edit')</button>
		        	<button class="btn btn-primary btn-sm" onclick="on_confirm_delete()">@lang('button.delete')</button>
		        </div>
        		<div class="clearfix"></div>
      		</div>
	      	<div class="x_content">
				<div class="table-responsive">
		        <table id="table-system" class="table table-striped table-bordered jambo_table" style="width:1500px;">
		        	<thead>
		        		<tr class="headings">
							<th>
                              <input type="checkbox" id="check-all">
                            </th>
			        		<th>@lang('system.type')</th>
			        		<th>@lang('system.code')</th>
			        		<th>@lang('system.value_txt')</th>
			        		<th>@lang('system.value_num')</th>
			        		<th>@lang('label.created_by')</th>
			        		<th>@lang('label.created_at')</th>
			        		<th>@lang('label.changed_by')</th>
			        		<th>@lang('label.changed_at')</th>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-add-edit" class="form-horizontal form-label-left" data-parsley-validate>
				<div class="panelt panel-default">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="panel-title" id="form-pos-title"></h3>
					</div>
					<input type="text" name="id" id="id" hidden="hidden">
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">@lang('system.type') <span class="text-danger">*</span></label>
							<input type="text" name="system_type" class="form-control" placeholder="@lang('system.type')" required="required" id="system_type">
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">@lang('system.code') <span class="text-danger">*</span></label>
							<input type="text" name="system_code" class="form-control" placeholder="@lang('system.code')" required="required" id="system_code">
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">@lang('system.value_txt') </label>
							<input type="text" name="system_value_txt" class="form-control" placeholder="@lang('system.value_txt')" id="system_value_txt">
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">@lang('system.value_num') </label>
							<input type="text" name="system_value_num" class="form-control" placeholder="@lang('system.value_num')" id="system_value_num">
							<span class="help-block"></span>
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
			<button type="button" onclick="on_delete()" id="btn-confirm" class="btn btn-primary btn-sm">@lang('button.yes')</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">@lang('button.no')</button>
		</div>
	  </div>
	</div>
</div>         
            
@endsection

@push('js')
<script type="text/javascript">
	var ADD_SYS = "@lang('system.add')";
	var EDIT_SYS = "@lang('system.edit')";
</script>

<script src="{{ asset('assets/js/systemmaster.js') }}" type="text/javascript" ></script>
@endpush