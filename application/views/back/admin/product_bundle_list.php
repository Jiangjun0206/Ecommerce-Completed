<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<div class="panel-body" id="demo_s">
    <table id="bundle-table" class="table table-striped"  data-url="<?php echo base_url(); ?>admin/product_bundle/list_data" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"  data-show-refresh="true" data-search="true"  data-show-export="true" >
        <thead>
            <tr>
                <th data-field="image" data-align="right" data-sortable="true">
                    <?php echo translate('image');?>
                </th>
                <th data-field="title" data-align="center" data-sortable="true">
                    <?php echo translate('title');?>
                </th>
                <th data-field="current_stock" data-sortable="true">
                    <?php echo translate('current_stock');?>
                </th>
                <th data-field="deal" data-sortable="false">
                    <?php echo translate("today's_deal");?>
                </th>
                <th data-field="publish" data-sortable="false">
                    <?php echo translate('publish');?>
                </th>
                <th data-field="featured" data-sortable="false">
                    <?php echo translate('featured');?>
                </th>
                <th data-field="options" data-sortable="false" data-align="right">
                    <?php echo translate('options');?>
                </th>
            </tr>
        </thead>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bundle-table').bootstrapTable({

        }).on('all.bs.table', function (e, name, args) {
            //alert('1');
            //set_switchery();
        }).on('click-row.bs.table', function (e, row, $element) {
            
        }).on('dbl-click-row.bs.table', function (e, row, $element) {
            
        }).on('sort.bs.table', function (e, name, order) {
            
        }).on('check.bs.table', function (e, row) {
            
        }).on('uncheck.bs.table', function (e, row) {
            
        }).on('check-all.bs.table', function (e) {
            
        }).on('uncheck-all.bs.table', function (e) {
            
        }).on('load-success.bs.table', function (e, data) {
            set_switchery();
        }).on('load-error.bs.table', function (e, status) {
            
        }).on('column-switch.bs.table', function (e, field, checked) {
            
        }).on('page-change.bs.table', function (e, size, number) {
            //alert('1');
            //set_switchery();
        }).on('search.bs.table', function (e, text) {
            
        });
    });

</script>

