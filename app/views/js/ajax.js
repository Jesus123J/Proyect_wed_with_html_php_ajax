/*---------------Form Register User--------------*/
export const createUserRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------Form Login User--------------*/
export const loginUserRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------Client Products--------------*/
export const getProductsRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/productsAjax.php",
    {
      method: "GET",
    }
  );

  const res = await response.json();

  return res;
};

/*---------------Create Order--------------*/
export const createOrderRequest = async (data) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/orderAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------Create Suggestion--------------*/
export const createSuggestionRequest = async (data) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/suggestionsAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------Create Complaint--------------*/
export const createComplaintRequest = async (data) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/complaintsAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------Get User Logged--------------*/
export const getUserLoggedRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();

  if (response.status === 404) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------User Logout--------------*/
export const userLogout = async () => {
  const data = {
    type: "logout",
  };

  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );

  return response.ok;
};

/*---------------Get Orders By Dni--------------*/
export const getOrdersByDniRequest = async (dni) => {
  const response = await fetch(
    `http://localhost/foodlicious/app/ajax/orderAjax.php?dni=${dni}`,
    {
      method: "GET",
    }
  );

  if (!response.ok) {
    throw new Error(res.message);
  }

  const res = await response.json();

  return res;
};

/*---------------Get Order Detail--------------*/
export const getOrderDetailRequest = async (id) => {
  const response = await fetch(
    `http://localhost/foodlicious/app/ajax/orderAjax.php?id=${id}`,
    {
      method: "GET",
    }
  );

  const res = await response.json();

  return res;
};

/*---------------Form Edit User--------------*/
export const editUserRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php",
    {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

/*---------------- Obtener Product Admin ----- */

export const deletProductRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/productsAjax.php?",
    {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );
  const res = await response.json();
  if (!response.ok) {
    throw new Error(res.message);
  }
  return res;
};

export const editProductRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/productsAjax.php",
    {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );
  const res = await response.json();
  if (!response.ok) {
    throw new Error(res.message);
  }
  return res;
};

export const getOrders = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/orderAjax.php?type=getOrder",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};
/*---------------Get Frequen Questions--------------*/

export const getFrequenQuestionsRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/frequentQuestionsAjax.php",
    {
      method: "GET",
    }
  );

  const res = await response.json();

  return res;
};

/*---------------Get Complaints--------------*/

export const getComplaintsRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/complaintsAjax.php",
    {
      method: "GET",
    }
  );

  const res = await response.json();

  return res;
};

/*---------------Update Frequent Question--------------*/

export const updateFrequentQuestionRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/frequentQuestionsAjax.php",
    {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const deleteFrequentQuestionRequest = async (id) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/frequentQuestionsAjax.php",
    {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(id),
    }
  );

  console.log(id);

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const createFrequentQuestionRequest = async (formData) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/frequentQuestionsAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const getOrdersByDayRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/orderAjax.php",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();
  console.log(res);

  return res;
};

export const getDataDashboardRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/dashboardAjax.php",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();

  return res;
};

export const getUsersRequest = async () => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/userAjax.php?users",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();

  return res;
};

export const deleteUserRequest = async (dni) => {
  const response = await fetch(
    `http://localhost/foodlicious/app/ajax/userAjax.php?dni=${dni}`,
    {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const deleteComplaintByIdRequest = async (id) => {
  const response = await fetch(
    `http://localhost/foodlicious/app/ajax/complaintsAjax.php?id=${id}`,
    {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const updateComplaintByIdRequest = async (data) => {
  const response = await fetch(
    `http://localhost/foodlicious/app/ajax/complaintsAjax.php`,
    {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );

  const res = await response.json();

  if (!response.ok) {
    throw new Error(res.message);
  }

  return res;
};

export const createProductRequest = async (data) => {
  const response = await fetch(
    "http://localhost/foodlicious/app/ajax/productsAjax.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    }
  );
  const res = await response.json();
  if (!response.ok) {
    throw new Error(res.message);
  }
  return res;
};
