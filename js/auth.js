async function checkAuthentication() {
    const token = localStorage.getItem("authToken");
    console.log("Auth Token:", token);
  
    if (!token) {
      // Redirect to login if no token is found
      window.location.href = "login.html";
      return false;
    }
  
    try {
      // Validate the token with the backend
      const response = await fetch("public/validate_token.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      });
  
      const data = await response.json();
  
      if (!data.success) {
        // If token is invalid, remove it and redirect to login
        localStorage.removeItem("authToken");
        window.location.href = "login.html";
        return false;
      }
  
      // Token is valid
      return true;
    } catch (error) {
      console.error("Error validating token:", error);
      localStorage.removeItem("authToken");
      window.location.href = "login.html";
      return false;
    }
  }