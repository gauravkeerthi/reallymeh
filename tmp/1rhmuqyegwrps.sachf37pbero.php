 
<div class="container">
    <h3>ADMIN: EDIT</h3>
    <div class="col-md-12 form-group" >
        <form  method="POST" action="<?php echo $BASE; ?>/admin/editquiz/<?php echo $quiz['id']; ?>" enctype="multipart/form-data">
            <label class=" col-sm-3 text-right" for="quiz_name">Quiz Name</label>
            <div class="  col-sm-9">
                <input id="quiz_name" type="text" class="form-control" name="name" value="<?php echo $quiz['name']; ?>">
            </div>        

            <label  class=" col-sm-3 text-right" for="editor">Quiz Description</label>
            <div class="col-sm-9">
                <input name="description" type="hidden">
                <div id="editor_description" style="height:200px; margin-bottom: 20px "></div>
            </div>

            <label  class=" col-sm-3 text-right" for="editor">Quiz Description</label>
            <div class="col-sm-9">
                <img src="<?php echo $BASE; ?>/<?php echo $quiz['image']; ?>" class="img-responsive">
                <input type="file" id="quiz_image" name="image" />
            </div>
    
            <label  class=" col-sm-3 text-right">Quiz Conclusion</label>
            <div class="col-sm-9">
                <textarea name="conclusion"  id="quiz_conclusion" rows=5 class="form-control"><?php echo $quiz['conclusion']; ?></textarea>                
            </div>   
             
     
        <button class="btn btn-primary btn-block" type="submit">Submit Changes</button>       
        
        </form>
    </div>
</div>



 

    <script>
    // init the quill

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ list: 'ordered' }],
            ['link', 'image'],
            ['clean']                                         // remove formatting button
            ];
        
        var Parchment = Quill.import('parchment');
        var Block = Parchment.query('block');
        Block.tagName = 'SPAN';
        // or class NewBlock extends Block {}; NewBlock.tagName = 'DIV';
        Quill.register(Block /* or NewBlock */, true);

      var quill_description = new Quill('#editor_description', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
      });

       

      var form = document.querySelector('form');

           quill_description.clipboard.dangerouslyPasteHTML(0, "<?php echo $this->raw($quiz['description']); ?>"); 
          
        form.onsubmit = function() {
          // Populate hidden input for quiz description on submit
          var description = document.querySelector('input[name=description]');
          description.value =  quill_description.container.firstChild.innerHTML;       

          
      }
          


    </script> 
    </div>

