define(['jquery'], function($) {
    return {
        init: function(content, style) {
            var link = document.createElement("a");
            link.id = "mirobot";
            link.style = style;
            link.innerHTML = content;
            link.href = "/blocks/miro_web_bot/bot/index.php";
            link.addEventListener("mouseover", function() {
                link.style.opacity = 0.5;
            });

            link.addEventListener("mouseout", function() {
                link.style.opacity = 1.0;
            });
            document.body.appendChild(link);
        }
    };
});
