// $(function() {
//    var $questionIndex=("#questionIndex").text();
//     alert("questionIndex="+$questionIndex);
// });
$(function () {
    /* surveyTbl */

    // $(".surveyTbl").dataTable();

    /* Dunamic Add Question */
    var max_fields = 16; //maximum input boxes allowed
    var questionCountIndex = 0; //maximum input boxes allowed
    var additionalQuestions = $(".questionWrapperhold");
    var addMultichoiceQbtn = $(".addMultichoiceQbtn");
    var addInputBasebtn = $(".addInputBasebtn");
    var addYesNoQbtn = $(".addYesNoQbtn");
    var addLinearQbtn = $(".addLinearQbtn");
    var addDropDownQbtn = $(".addDropDownQbtn");
    var addImageBaseQbtn = $(".addImageBaseQbtn");
    var iq = $(".iq");

    const imageBaseQuestion =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">' +
        "Username" +
        '</label><div class="input-group mb-2"><input required class="form-control" id="inlineFormInputGroup" name="imageBaseQuestions[questions][lists][]" placeholder="input question here" type="text"/></div><div class="input-group mb-2"><div class="card card-body"><div class="row"><div class="col-12 d-flex"><div class="custom-file"><input type="file" required class="custom-file-input" name="ImageQuestion[]" id="customFile"><label class="custom-file-label" for="customFile">Choose file</label></div></div><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="optionA">Option A<input type="text" name="imageBaseQuestions[questions][options][A][]" class="form-control"></label><label for="answerOptionA" class="mt-3 ml-1">Is answer<input type="checkbox" name="[questions][answers][optionA][]" class="form-control"></label></div><div class="col-6 d-flex"><label for="optionA">Option B<input type="text" name="imageBaseQuestions[questions][options][B][]" class="form-control"></label><label for="answerOptionB" class="mt-3 ml-1">Is answer<input type="checkbox" name="[questions][answers][optionB][]" class="form-control"></label></div><div class="col-6 d-flex"><label for="optionC">Option C<input type="text" name="imageBaseQuestions[questions][options][C]" class="form-control"></label><label for="answerOptionC" class="mt-3 ml-1">Is answer<input type="checkbox" name="[questions][answers][optionC][]" class="form-control"></label></div><div class="col-6 d-flex"><label for="optionD">Option D<input type="text" name="IimageBaseQuestions[questions][options][D]" class="form-control"></label><label for="answerOptionD" class="mt-3 ml-1">Is answer<input type="checkbox" name="[questions][answers][optionD][]" class="form-control"></label></div></div></div> </div> </div></div><div class="remove_field btn btn-danger" style="cursor:pointer;">Remove</div></div>';

    const MultichoiceQuestion =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">Username</label><div class="input-group mb-2"><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="input qustion here" required name="MultiChoiceQuestions[questions][lists][]"></div><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="optionA">Option A <input type="text"  name="MultiChoiceQuestions[questions][options][A][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionA">Is answer <input value=1 type="checkbox" name="MultiChoiceQuestions[questions][answers][optionA][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionB">Option B<input type="text" name="MultiChoiceQuestions[questions][options][B][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionB">Is answer <input value=1 type="checkbox" name="MultiChoiceQuestions[questions][answers][optionB][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionC">Option C <input type="text" name="MultiChoiceQuestions[questions][options][C][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionC">Is answer <input value=1 type="checkbox" name="MultiChoiceQuestions[questions][answers][optionC][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionD">Option D<input type="text" name="MultiChoiceQuestions[questions][options][D][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionD">Is answer <input value=1 type="checkbox" name="MultiChoiceQuestions[questions][answers][optionD][]" class="form-control"></label></div></div></div></div><div style="cursor:pointer;" class="remove_field btn btn-danger">Remove</div></div></div></div>';

        const Sa =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">Username</label><div class="input-group mb-2"><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="input qustion here" required name="IqSal[questions][lists][]"></div><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="optionA">Option A <input type="text"  name="IqSal[questions][options][A][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionA">Is answer <input value=1 type="checkbox" name="IqSal[questions][answers][optionA][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionB">Option B<input type="text" name="IqSal[questions][options][B][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionB">Is answer <input value=1 type="checkbox" name="IqSal[questions][answers][optionB][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionC">Option C <input type="text" name="IqSal[questions][options][C][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionC">Is answer <input value=1 type="checkbox" name="IqSal[questions][answers][optionC][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionD">Option D<input type="text" name="IqSal[questions][options][D][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionD">Is answer <input value=1 type="checkbox" name="IqSal[questions][answers][optionD][]" class="form-control"></label></div></div></div></div><div style="cursor:pointer;" class="remove_field btn btn-danger">Remove</div></div></div></div>';

        const InputBaseType =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">' +
        "Username" +
        '</label><div class="input-group mb-2"><input required class="form-control" id="inlineFormInputGroup" name="InputBaseQuestions[questions][lists][]" placeholder="input question here" type="text"/></div><div class="remove_field btn btn-danger" style="cursor:pointer;">Remove</div></div></div>';

    const YesNoQuestion =
        '<div class="addtionalQstns"><div class="col-12 questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">' +
        "Username" +
        '</label><div class="mb-2 col-12"><input required class="form-control" id="inlineFormInputGroup" name="YesNoQuestions[questions][lists][]" placeholder="input question here" type="text"/><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="optionA">Yes Option <input required type="text" name="YesNoQuestions[questions][options][YesOptions][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionYes">Is answer <input type="checkbox" name="YesNoQuestions[questions][answers][Yesanswer][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionB">No Option <input required type="text" name="YesNoQuestions[questions][options][NoOptions][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionB">Is answer <input type="checkbox" name="YesNoQuestions[questions][answers][Noanswer][]" class="form-control"></label></div></div></div></div><div class="remove_field btn btn-danger" style="cursor:pointer;">Remove</div></div>';

    const LinearQuestion =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">' +
        "Username" +
        '</label><div class="input-group mb-2"><input class="form-control" id="inlineFormInputGroup" name="LinearQuestions[questions][lists][]" required placeholder="input question here" type="text"/></div><div class="input-group mb-2"><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="minVal">Minimum Value <input class="form-control" required name="LinearQuestions[questions][options][minVal][]" type="text"/></label></div><div class="col-6 d-flex"><label for="optionB"> Maximum Value <input required class="form-control" name="LinearQuestions[questions][options][maxVal][]" type="text"/></label> </div> </div> </div></div><div class="remove_field btn btn-danger" style="cursor:pointer;">Remove</div></div>';

    const dropDownQuestion =
        '<div class="addtionalQstns"><div class="col-auto questionHolders mt-3"><label class="sr-only" for="inlineFormInputGroup">Username</label><div class="input-group mb-2"><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="DROP DOWN SELECT FORM QUESTION: input qustion here" required name="dropDownQuestions[questions][lists][]"></div><div class="card card-body"><div class="row"><div class="col-6 d-flex"><label for="optionA">Option A <input type="text"  name="dropDownQuestions[questions][options][A][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionA">Is answer <input value=1 type="checkbox" name="dropDownQuestions[questions][answers][optionA][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionB">Option B<input type="text" name="dropDownQuestions[questions][options][B][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionB">Is answer <input value=1 type="checkbox" name="dropDownQuestions[questions][answers][optionB][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionC">Option C <input type="text" name="dropDownQuestions[questions][options][C][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionC">Is answer <input value=1 type="checkbox" name="dropDownQuestions[questions][answers][optionC][]" class="form-control"></label></div></div><div class="col-6 d-flex"><label for="optionD">Option D<input type="text" name="dropDownQuestions[questions][options][D][]" class="form-control"></label><div class="col-5 mt-2"><label for="answerOptionD">Is answer <input value=1 type="checkbox" name="dropDownQuestions[questions][answers][optionD][]" class="form-control"></label></div></div></div></div><div style="cursor:pointer;" class="remove_field btn btn-danger">Remove</div></div></div></div>';

    var x = 1; //initlal text box count
    $(addMultichoiceQbtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(MultichoiceQuestion);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });
    $(iq).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(Sa);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });
    $(addInputBasebtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(InputBaseType);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });

    $(addDropDownQbtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(dropDownQuestion);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });

    $(addYesNoQbtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(YesNoQuestion);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });

    $(addLinearQbtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(LinearQuestion);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });

    $(addImageBaseQbtn).click(function (e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) {
            //max input box allowed
            x++; //text box increment
            questionCountIndex++; //text box increment
            $("#questionIndex").html(questionCountIndex);
            $(additionalQuestions).append(imageBaseQuestion);
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        }
    });

    /* Remove Input fields*/
    $(additionalQuestions).on("click", ".remove_field", function (e) {
        //user click on remove text
        e.preventDefault();
        $(this).parent("div").remove();
        x--;
        questionCountIndex--;
        if ($(".form-control").length) {
            // alert("The element you're testing is present.");
            if ($(".saveQuestionsNow").prop("disabled", "disabled")) {
                $(".saveQuestionsNow").prop("disabled", false);
            } else {
                $(".saveQuestionsNow").prop("disabled", true);
            }
        } else {
            $(".saveQuestionsNow").prop("disabled", true);
        }
    });
});

/*
$(document).on('click', '.saveQuestionsNow', function (e) {
      e.preventDefault();
      let fd = new FormData();


      // var axiosproducturl = '/admin/dashboard/products/add-new-product';


      $("input[name='MultiChoiceQuestions'").map(function (i, el) {
        if (i != 'undefined') {
          return fd.append('MultiChoiceQuestions[]', $(el).val);
        }
      });
      $("#sizes :selected").map(function (i, el) {
        if (i != 'undefined') {
          return fd.append('sizes[]', $(el).attr('id'));
        }
      });

      var category = $('select[name=category]').val();
      var stockstatus = $('select[name=stockstatus]').val();

      if ($("#discount").val() != '') {
        fd.append('discount', discount);
      }
      if ($("#productImage").length) {
        var productImage = document.querySelector('#productImage').files[0];
        fd.append('productImage', productImage);
      }
      fd.append('cost_price', cost_price);
      fd.append('price', price);
});
*/
