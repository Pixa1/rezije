<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal">Unesite točne podatke</h4>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="Datum">Datum</label>
                        <input type="text" class="form-control" id="Date" name="Date" disabled >
                    </div>
                    <div class="form-group">
                        <label for="VK">Voda Kuća</label>
                        <input type="text" class="form-control" id="VK" name="VK" placeholder="Voda Kuća u m3" value="" maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="VP">Voda Pixa</label>
                        <input type="text" class="form-control" id="VP" name="VP" placeholder="Voda Pixa u m3" value="" maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="SK">Struja Kuća</label>
                        <input type="text" class="form-control" id="SK" name="SK" placeholder="Struja Kuća u KW" value="" maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="SP">Struja Pixa</label>
                        <input type="text" class="form-control" id="SP" name="SP" placeholder="Struaj Pixa u KW" value="" maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="SJ">Struja Jura</label>
                        <input type="text" class="form-control" id="SJ" name="SJ" placeholder="Struja Jura u KW" value="" maxlength="50" >
                    </div>
                    <div class="form-group">
                        <label for="ST">Struja Bero</label>
                        <input type="text" class="form-control" id="ST" name="ST" placeholder="Struja Bero u KW" value="" maxlength="50" >
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="create">Spremi
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>