{literal}

<div id="template-vue-comments">
  <div>
  <section class="mt-5" v-if="comments.length">
    <div class="row">
      <div class="col-md-8">
        
        <div class="clearfix">
          <h5 class="float-left mb-4">{{ subtitle }}</h5>
          <div class="btn-group float-right">
            <button  type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Order by
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" v-on:click="orderBy(options[1], options[3])">Newest comments</a>
              <a class="dropdown-item" v-on:click="orderBy(options[1], options[2])">Older comments</a>
              <a class="dropdown-item" v-on:click="orderBy(options[0], options[3])">Top scores</a>
              <a class="dropdown-item" v-on:click="orderBy(options[0], options[2])">Worst scores</a>
            </div>
          </div>
        </div>
        
        <ul class="list-group list-group-flush">
          <li class="list-group-item" v-for="comment in comments">

            <div class="clearfix">
              <span class="float-left"
                ><b>{{ comment.user }}</b> gives <b>{{ comment.score }}</b> stars
                and says:</span
              >
              <span class="text-secondary float-right">{{ comment.date }}</span>
            </div>
            <button
              v-if="admin==1"
              v-on:click="deleteComment(comment.id_comment)"
              type="button"
              class="close"
              id="remove-comment"
              aria-label="Close"
              :data-id_comment="comment.id_comment"
            >
              <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ comment.comment }}</p>
          </li>
        </ul>
      </div>

      <div class="col-md-4">
        <h3>User score:</h3>

        <div v-if="average > 2.5">
          <span class="green float-left">{{ average }}</span>
          <div>
            Generally favorable reviews based on <b>{{ size }} critics</b>
          </div>
        </div>

        <div v-else>
          <span class="red float-left">{{ average }}</span>
          <div>
            Generally unfavorable reviews based on <b>{{ size }} critics</b>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="mt-3" v-if="login == 1">
  <h5>Insert your comment</h5>
  <form id="form-comments">
      <input type="hidden" id="user" value="{$email}">

      <div class="form-group">
          <label for="comment-text">Comment</label>
          <textarea class="form-control" id="comment-text" name="comment" rows="3" required></textarea>
      </div>

      <div class="form-group">
          <label for="score-select">Score</label>
          <select class="form-control" id="score-select" name="score">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
          </select>
      </div>
      
      <button v-on:click="addComment" id="sendComment" class="btn btn-primary">Submit</button>
  </form>
  </div>


</div>
</div>
</div>
{/literal}
