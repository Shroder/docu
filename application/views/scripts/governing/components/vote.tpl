<div style="display: block;" class="left bottom" id="Rating">
    <form onsubmit="return processRating(this);">
        <input type="hidden" value="true" name="enableRating">
        <input type="hidden" value="1" name="rating">
        <input type="hidden" value="true" name="upvote">                  
        <input type="submit" class="ratingbutton1" value=" ">
    </form>
     <form onsubmit="return processRating(this);">
        <input type="hidden" value="true" name="enableRating">
        <input type="hidden" value="1" name="rating">
        <input type="hidden" value="true" name="downvote">                  
        <input type="submit" class="ratingbutton2" value=" ">
    </form>

    <br clear="all">
    <strong id="rank" class="color2 marginright"> 0</strong> 
    <span id="vote_count" class="small"> 0 votes</span>
</div>