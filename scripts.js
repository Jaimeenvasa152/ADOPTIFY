function openTab(tabName) {
    var tabs = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
  
    var tabButtons = document.getElementsByClassName("tab-button");
    for (var i = 0; i < tabButtons.length; i++) {
      tabButtons[i].classList.remove("active");
    }
    document.querySelector("button[data-tab='" + tabName + "']").classList.add("active");
  }
  
  document.getElementById("product-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var productName = document.getElementById("product-name").value;
    var shop = document.getElementById("shop").value;
    // Logic to add product to the database
  });
  
  // Fetch and display requests from the database
  // Example:
  var requests = [
    { user: "User 1", product: "Pet 1", status: "Pending" },
    { user: "User 2", product: "Pet 2", status: "Approved" },
    // Add more requests as needed
  ];
  
  var requestsTable = document.getElementById("requests-table").getElementsByTagName("tbody")[0];
  requests.forEach(function(request) {
    var row = requestsTable.insertRow();
    row.innerHTML = "<td>" + request.user + "</td><td>" + request.product + "</td><td>" + request.status + "</td><td><button>Approve</button><button>Reject</button></td>";
  });
  