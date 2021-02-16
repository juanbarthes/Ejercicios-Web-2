{if $login}
<div class="mt-3">
<h5>Insert your comment</h5>
<form id="form-comments" action="insert-comment" method="post">
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
    
    <button type="submit" id="sendComment" class="btn btn-primary">Submit</button>
</form>
</div>

{/if}

</div>
</div>