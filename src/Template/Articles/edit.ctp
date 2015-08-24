<h1>Edit Article</h1>
  <?php
      echo "<p />";
    echo $this->Form->create($article);
    
      //set small js block via cakephp used to set the WYSIWYG editor for emails
  echo $this->Html->scriptStart(['block' => true]);
  //set tinymce to show in the message textarea of the form with all these extra functionality / plugins.
  echo "tinymce.init({ selector: '#post',
                       theme: 'modern',
                       plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                'searchreplace wordcount visualblocks visualchars fullscreen',
                                'insertdatetime media nonbreaking save table contextmenu directionality',
                                'emoticons template paste textcolor colorpicker textpattern imagetools'],
                                toolbar1: 'insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent   indent | link image',
                                toolbar2: 'print preview media | forecolor backcolor emoticons',
                                image_advtab: true,
                                tools: 'inserttable'});";
  echo $this->Html->scriptEnd(); 
    
    echo $this->Form->input('title');
    echo $this->Form->input('post',  ['rows' => '15', 'cols' => '95', 'label' => 'body']);
    echo $this->Form->button(__('Save Article'));    
    echo $this->Form->end();   

?>