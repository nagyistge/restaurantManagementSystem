//Employees
$(document).ready(function() {
        $('#Employees').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Name: {
                    message: 'Name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Name is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'ItemCode can only consist of alphabets'
                        }
                    }
                },
                Designation: {
                    message: 'Designation is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Designation is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Designation can only consist of alphabets'
                        }
                    }
                },
                Mobile: {
                    message: 'Mobile is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Mobile is required and cannot be empty'
                        },
                         regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Mobile can only consist of numbers'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                        message: 'Mobile must be of 10 numbers'
                        }

                    }
                },
                Alternate_Mobile: {
                    message: 'Alternate_Mobile is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Alternate_Mobile is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Alternate_Mobile can only consist of numbers'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                        message: 'Alternate_Mobile must be of 10 numbers'
                        }
                    }
                },
                Email: {
                    message: 'Email is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        }
                    }
                }
            }
        });
    });

//OpenShift Validation
$(document).ready(function() {
        $('#OpenShift').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	Employee_id: {
                    message: 'Employee_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Employee_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Employee_id can only consist of alphabetical and number'
                        }
                    }
                }

            	
            }
        });
    });
//CloseShift validation
$(document).ready(function() {
        $('#CloseShift').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Employee_id: {
                    message: 'Employee_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Employee_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Employee_id can only consist of alphabetical and number'
                        }
                    }
                }

                
            }
        });
    });
//OpemBillingOutlet
$(document).ready(function() {
        $('#OpenBillingOutlet').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Employee_id: {
                    message: 'Employee_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Employee_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Employee_id can only consist of alphabetical and number'
                        }
                    }
                },
                OpeningAmount: {
                    message: 'OpeningAmount is not valid',
                    validators: {
                        notEmpty: {
                            message: 'OpeningAmount is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'OpeningAmount can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
//CloseBillingOutlet
$(document).ready(function() {
        $('#CloseBillingOutlet').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Employee_id: {
                    message: 'Employee_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Employee_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Employee_id can only consist of alphabetical and number'
                        }
                    }
                },
                OpeningAmount: {
                    message: 'ClosingAmount is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ClosingAmount is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'ClosingAmount can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
//CustomerDetails
$(document).ready(function() {
        $('#CustomerDetails').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Name: {
                    message: 'Name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Name is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Name can only consist of alphabets'
                        }
                    }
                },
                NoofPeople: {
                    message: 'NoofPeople is not valid',
                    validators: {
                        notEmpty: {
                            message: 'NoofPeople is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'NoofPeople can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
//Purchase requisition
$(document).ready(function() {
        $('#PurchaseRequisition').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Requisition_Reference: {
                    message: 'Requisition_Reference is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Requisition_Reference is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Requisition_Reference can only consist of alphabets'
                        }
                    }
                },
                CreatedBy: {
                    message: 'CreatedBy is not valid',
                    validators: {
                        notEmpty: {
                            message: 'CreatedBy is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'CreatedBy can only consist of alphabets'
                        }
                    }
                },
                Authorization: {
                    message: 'Authorization is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Authorization is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Authorization can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
//Payment
$(document).ready(function() {
        $('#Payment').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Customer_id: {
                    message: 'Customer_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Customer_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Customer_id can only consist of numbers'
                        }
                    }
                },
                ServiceTax: {
                    message: 'ServiceTax is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ServiceTax is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'ServiceTax can only consist of numbers'
                        }
                    }
                },
                TotalAmount: {
                    message: 'TotalAmount is not valid',
                    validators: {
                        notEmpty: {
                            message: 'TotalAmount is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'TotalAmount can only consist of numbers'
                        }
                    }
                }
            }
        });
    });
//OrderEntry
$(document).ready(function() {
        $('#OrderEntry').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Customer_id: {
                    message: 'Customer_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Customer_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Customer_id can only consist of numbers'
                        }
                    }
                },
                ItemCode: {
                    message: 'ItemCode is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemCode is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'NoofPeople can only consist of numbers and alphabets'
                        }
                    }
                },
                Qunatity: {
                    message: 'Qunatity is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Qunatity is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Qunatity can only consist of numbers'
                        }
                    }
                },
                PricePerUnit: {
                    message: 'PricePerUnit is not valid',
                    validators: {
                        notEmpty: {
                            message: 'PricePerUnit is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'PricePerUnit can only consist of numbers'
                        }
                    }
                },
                ModificationsInDish: {
                    message: 'ModificationsInDish is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ModificationsInDish is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ModificationsInDish can only consist of numbers and alphabets'
                        }
                    }
                },
                ModificationsPrice: {
                    message: 'ModificationsPrice is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ModificationsPrice is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'ModificationsPrice can only consist of numbers'
                        }
                    }
                },
                Discount: {
                    message: 'Discount is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Discount is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Discount can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
//Purchase Order
$(document).ready(function() {
        $('#PurchaseOrder').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Vendor: {
                    message: 'Vendor is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Vendor is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Vendor can only consist of numbers and alphabets'
                        }
                    }
                },
                POValue: {
                    message: 'POValue is not valid',
                    validators: {
                        notEmpty: {
                            message: 'POValue is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'POValue can only consist of numbers'
                        }
                    }
                },
                DeliveryDate: {
                    message: 'DeliveryDate is not valid',
                    validators: {
                        notEmpty: {
                            message: 'DeliveryDate is required and cannot be empty'
                        },
                        date: {
                        format: 'YYYY/MM/DD',
                        message: 'DeliveryDate is not a valid date'
                            }
                    }
                },
                PaymentTerms: {
                    message: 'PaymentTerms is not valid',
                    validators: {
                        notEmpty: {
                            message: 'PaymentTerms is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'PaymentTerms can only consist of numbers and alphabets'
                        }
                    }
                },
                Authorization: {
                    message: 'Authorization is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Authorization is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Authorization can only consist of numbers and alphabets'
                        }
                    }
                },
                Employee_id: {
                    message: 'Employee_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Employee_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Employee_id can only consist of numbers and alphabets' 
                        }
                    }
                }
            }
        });
    });
//Transactions
$(document).ready(function() {
        $('#Transactions').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                ItemCode: {
                    message: 'ItemCode is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemCode is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ItemCode can only consist of numbers and alphabets'
                        }
                    }
                },
                Transaction_id: {
                    message: 'Transaction_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Transaction_id is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Transaction_id can only consist of numbers and alphabets'
                        }
                    }
                },
                Item_Name: {
                    message: 'Item_Name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Item_Name is required and cannot be empty'
                        },
                         regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Item_Name can only consist of alphabets and numbers'
                        }

                    }
                },
                Quantity: {
                    message: 'Quantity is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Quantity is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Quantity can only consist of numbers'
                        }
                    }
                },
                PricePerUnit: {
                    message: 'PricePerUnit is not valid',
                    validators: {
                        notEmpty: {
                            message: 'PricePerUnit is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'PricePerUnit can only consist of numbers'
                        }
                    }
                }
            }
        });
    });
//PhysicalStockEntry
$(document).ready(function() {
        $('#PhysicalStockEntry').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                ItemCode: {
                    message: 'ItemCode is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemCode is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ItemCode can only consist of numbers and alphabets'
                        }
                    }
                },
                ItemValuePerUnit: {
                    message: 'ItemValuePerUnit is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemValuePerUnit is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ItemValuePerUnit can only consist of numbers and alphabets'
                        }
                    }
                },
                QuantityInStore: {
                    message: 'QuantityInStore is not valid',
                    validators: {
                        notEmpty: {
                            message: 'QuantityInStore is required and cannot be empty'
                        },
                         regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'QuantityInStore can only consist of numbers'
                        }

                    }
                },
                Quantity: {
                    message: 'Quantity is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Quantity is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Quantity can only consist of numbers'
                        }
                    }
                },
                PricePerUnit: {
                    message: 'PricePerUnit is not valid',
                    validators: {
                        notEmpty: {
                            message: 'PricePerUnit is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'PricePerUnit can only consist of numbers'
                        }
                    }
                }
            }
        });
    });
//Items
$(document).ready(function() {
        $('#Items').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                ItemCode: {
                    message: 'ItemCode is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemCode is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ItemCode can only consist of alphabets and numbers'
                        }
                    }
                },
                ItemName: {
                    message: 'ItemName is not valid',
                    validators: {
                        notEmpty: {
                            message: 'ItemName is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'ItemName can only consist of numbers and alphabets'
                        }
                    }
                },
                Type: {
                    message: 'Type is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Type is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Type can only consist of alphabets'
                        }
                    }
                },
                Rate: {
                    message: 'Rate is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Rate is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Rate can only consist of numbers'
                        }
                    }
                },
                Tax: {
                    message: 'Tax is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Tax is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Tax can only consist of numbers'
                        }
                    }
                },
                Discount: {
                    message: 'Discount is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Discount is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Discount can only consist of numbers'
                        }
                    }
                }
                
            }
        });
    });
