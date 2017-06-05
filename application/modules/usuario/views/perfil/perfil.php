<div class="page-header">
	<h2>Editar Perfil</h2>
</div>

<div style="margin-left: 80px; margin-right: 80px">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Informações</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" action="">
			<div class="box-body">
			<div class="form-group">
				<label for="user-name" class="col-sm-2 control-label">Nome</label>

				<div class="col-sm-10">
				<input type="text" class="form-control" id="user-name" placeholder="Nome">
				</div>
			</div>
			<div class="form-group">
				<label for="user-email" class="col-sm-2 control-label">Email:</label>

				<div class="col-sm-10">
				<input type="email" class="form-control" id="user-email" placeholder="Email" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="user-email" class="col-sm-2 control-label">Login:</label>

				<div class="col-sm-10">
				<input type="text" class="form-control" id="user-login" placeholder="Login" readonly>
				</div>
			</div>
			<div id="divgroup-newpass" class="form-group" hidden>
				<label for="user-newpass" class="col-sm-2 control-label">Nova Senha:</label>

				<div class="col-sm-10">
				<input type="password" class="form-control newpassword" id="user-newpass" placeholder="Nova Senha">
				</div>
			</div>
			<div id="divgroup-newpass-confirm" class="form-group" hidden>
				<label for="user-newpass-confirm" class="col-sm-2 control-label">Confirmar Senha:</label>

				<div class="col-sm-10">
				<input type="password" class="form-control newpassword" id="user-newpass-confirm" placeholder="Confirmar Nova Senha">
				</div>

				<div class="col-sm-2"></div>
				<div id="div-newpass-message" class="col-sm-10" style="color: red" hidden>
					As senhas devem ser iguais.
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label>
						<input id="user-changepass" type="checkbox"> Alterar Senha
						</label>
					</div>
				</div>
			</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">		
				<button type="button" id="save-btn" class="btn btn-info pull-right">Salvar</button>
			</div>
			<!-- /.box-footer -->
		</form>
	</div>
</div>



<script src=<?php echo base_url()."assets/pages/usuario/perfil/perfil.js"?>></script>