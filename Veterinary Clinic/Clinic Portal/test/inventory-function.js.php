<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    });

    function deleteId(rowId) {
        document.getElementById("editId").value = rowId;
    }

    function getRowID(rowId, rowName, rowMaxQuantity, rowMinQuantity, rowType) {
        document.getElementById("editId").value = rowId;
        document.getElementById("editName").value = rowName;
        document.getElementById("editMaxQuantity").value = rowMaxQuantity;
        document.getElementById("editMinQuantity").value = rowMinQuantity;
        document.getElementById("editType").value = rowType;
    }

    function displayRadioValue() {
        var ele = document.getElementsByName('category');

        for (i = 0; i < ele.length; i++) {
            if (ele[i].checked)
                document.getElementById("search").value = ele[i].value;
        }
    }

    function clearInputs(){
        document.getElementById("addId").value = "";
        document.getElementById("addName").value = "";
        document.getElementById("addQuantity").value = "";
        document.getElementById("addType").value = "Dog Food";
    }

    function clearSearch(){
        document.getElementById("search").value = "";
    }

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    function openFormEdit() {
        document.getElementById("myForm-edit").style.display = "block";
    }

    function closeFormEdit() {
        document.getElementById("myForm-edit").style.display = "none";
    }

    function openFormFilter() {
        document.getElementById("myForm-filter").style.display = "block";
    }

    function closeFormFilter() {
        document.getElementById("myForm-filter").style.display = "none";
    }

    function openFormDelete() {
        document.getElementById("myForm-delete").style.display = "block";
    }

    function closeFormDelete() {
        document.getElementById("myForm-delete").style.display = "none";
    }
</script>