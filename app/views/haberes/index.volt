{{ content() }}
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> ACTUALIZAR HABERES</h4>
            {{ form('haberes/upload',"method":"post","enctype":"multipart/form-data","class":"form-horizontal style-form") }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">PERIODO</label>
                {{ date_field("fecha", "size": 32) }}
            </div>
            <div class="form-group">
                <label for="fileIml" class="col-sm-2 col-sm-2 control-label">ARCHIVO IML</label>
                {{ file_field("fileIml[]") }}
            </div>
            <div class="form-group">
                <label for="fileImps" class="col-sm-2 col-sm-2 control-label">ARCHIVO IMPS</label>
                {{ file_field("fileImps[]") }}
            </div>
            <div class="form-group">
                <label for="fileSac" class="col-sm-2 col-sm-2 control-label">ARCHIVO SAC</label>
                {{ file_field("fileSac[]") }}
            </div>
            <div class="form-group ">

                <div class="radio col-sm-offset-2">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Sobreescribir
                    </label>
                </div>
                <div class="radio col-sm-offset-2">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Actualizar
                    </label>
                </div>
            </div>

            <div class="form-group ">
                {{ submit_button("Cargar Datos", "class": "btn btn-primary col-sm-4 col-sm-offset-1") }}
            </div>

            {{ end_form() }}

        </div>
    </div><!-- col-lg-12-->
</div><!-- /row -->


