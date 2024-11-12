@extends('layout.layout_admin.admin')

@section('title')
تدبير الأكاديميات
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير الأكاديميات</h2>

<div class="content">

 <!--report thead-->
    <div class="container ">
    <table class="table table-bordered text-center">
         <tbody>
          <tr>
            <td colspan="3">
              <img src="{{ asset('/admin/images/logo.png')}}" style="height : 100px; width : 400px">

            </td>
          </tr>
           <tr>
            <td colspan="3">
                <ul class="nolist">
                    <li> الأكاديمية الجهوية للتربية والتكوين لجهة سوس ماسة</li>
                    <li>مصلحة تأطير المؤسسات التعليمية والتوجيه  </li>
                    <li> المديرية الإقليمية تارودانت </li>
                </ul>

            </td>
          </tr>
          <tr>
            <td  colspan="3">حصيلة أنشطة التوجيه المدرسي والمهني</td>
          </tr>
          <tr>
            <td>اسم المستشار في التوجيه :عزيز بوفريوا</td>
            <td>لشهر :دجنبر 2020</td>
            <td>القطاع رقم 9/16</td>
          </tr>
        </tbody>
      </table>


      <div class="table-responsive">

        <table class="table table-striped custom-table table-bordered">
          <thead>
            <tr>
              <th scope="col" style="width: 15%" >محور النشاط</th>
              <th scope="col"  style="width: 15%">المؤسسة</th>
              <th scope="col"  style="width: 33%">عنوان النشاط</th>
              <th scope="col"  style="width: 7%">تاريخ الانجاز</th>
              <th scope="col" style="width: 15%">الفئة المستهدفة</th>
              <th scope="col" style="width: 10%"> عدد المستفيدين </th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
          
              <td  rowspan="3">
                خدمة الإعلام المدرسي والمهني
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                -	مدخل نحو المشروع الشخصي
                -	مدخل نحو المشروع الشخصي
                -	مدخل نحو المشروع الشخصي
                -	مدخل نحو المشروع الشخصي
                -	مدخل نحو المشروع الشخصي

                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              <!--td>
                خدمة الإعلام المدرسي والمهني
              </td-->
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              <!--td>
                خدمة الإعلام المدرسي والمهني
              </td-->
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              <td rowspan="4">
                تقديم خدمة الاستشارة
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
             
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
             
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              <td rowspan="2">
                تقديم خدمة المواكبة النفسية الاجتماعية
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
             
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

          <tr scope="row">
          
              <td>
                خدمة الإعلام المدرسي والمهني
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                  <a href="#">الثانوية الإعدادية الحضرمي</a>
                </div>
              </td>
              <td>
                -	مدخل نحو المشروع الشخصي
                  
              </td>
              <td>05/01/2020</td>
              <td>الثالثة إعدادي 1  دولي</td>
              <td class="more">12</td>
            
            </tr>

         
          </tbody>
        </table>
      </div>


    </div>

  </div>
    






@endsection

@section('scripts')

<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>
@endsection
