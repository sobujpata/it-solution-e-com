<div class="all-Orders-Details">
    <div class="head-newProduct">
        <h1>Edit Main Category</h1>
        <button type="button" class="black-70-button"><a href="{{ url('/main-category') }}">Main Category List</a></button>

    </div>

    <div class="addProduct">
        <div class="productHeader">
            <h2>Main Category information</h2>
            
        </div>
        <form id="save-form">
            
            <div class="input-grid">
                <input class="d-none" id="categoryId" class="categoryId" type="text" value="{{ $mainCategory->id }}">

                <span>
                    <p>Main Category Name*</p>
                    <input id="categoryName" class="categoryName" type="text" value="{{ $mainCategory->categoryName }}">
                </span>
           
                <span>
                    <p>Main Category Image</p>
                    <img class="" id="newImg" src="{{asset($mainCategory->categoryImg)}}" style="width:50px;"/>
                    
                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" name="img1" id="img1" style="white-space: 80%; float:right;">
                </span>
                
            </div>
            <button type="reset" id="main-category-form" class="black-70-button">Clear Form</button>
            <button onclick="Update()" class="black-button" >Update Main Category</button>
        </form>


       

    </div>
</div>

<script>
    async function Update() {
    let categoryId = document.getElementById('categoryId').value;
    let categoryName = document.getElementById('categoryName').value;
    let img1 = document.getElementById('img1').files[0];
    
    
    if (!categoryName) return errorToast("main-category categoryName is Required!");
    

    
    let formData = new FormData();
    
    formData.append('id', categoryId);
    formData.append('categoryName', categoryName);
    formData.append('img1', img1);
    

    // console.log([...formData.entries()]); // Debugging formData

    try {
        showLoader();
        let res = await axios.post("/update-main-category", formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });
        // console.log(res)
        hideLoader();
        if (res.status === 200) {
            successToast('Main Category Updated Successfully!');
            window.location.href = '/main-category';
        } else {
            errorToast("Failed to Update Main Category");
        }
    } catch (error) {
        hideLoader();
        if (error.response && error.response.data.message) {
            errorToast("Server Error: " + error.response.data.message);
        } else {
            errorToast("An Error Occurred: " + error.message);
        }
    }
}

</script>