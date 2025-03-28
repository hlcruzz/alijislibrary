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

$(document).on("click", ".showFaq", function () {
  const index = $(".showFaq").index(this);
  dropFAQ($(`.faq-p`).eq(index), $(this), $(`.closeFaq`).eq(index));
});
