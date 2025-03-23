function dropFAQ(p, plus, close) {
  p.css("max-height", "1000px");
  close.show();
  plus.hide();

  close.on("click", function () {
    p.css("max-height", "0px");
    close.hide();
    plus.show();
  });
}

$(".showFaq").each(function (index) {
  $(this).on("click", function () {
    dropFAQ($(`.faq-p`).eq(index), $(this), $(`.closeFaq`).eq(index));
  });
});
