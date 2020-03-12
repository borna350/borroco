<div class="modal  fade" id="modal-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
           <div class="modal-title" style="color: #222;" id="exampleModalLabel">Company Info</div>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
           <p>
                {{ isset($info->company_text) ? $info->company_text : '' }}
           </p>
           
           <p>For any other information, please contact our Customer Service.</p>
           <p style="text-align: center;"><a class="btn" href="{{route('user.support')}}">CONTACT
                   SUPPORT</a></p>
           <p>&nbsp;</p>
       </div>
   </div>
</div>
</div>
