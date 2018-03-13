<h2>Créer une tâche</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('todo/create') ?>
    <label for="title">Enoncé de la tâche</label>
    <input type="input" name="title"/><br/>
    <input type="submit" name="submit" value="Créer une tâche"/>
</form>
