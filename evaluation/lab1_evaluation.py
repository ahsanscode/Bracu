import numpy as np

def calculate_mean(numbers):
    total = np.sum(numbers)
    mean = total / len(numbers)
    return mean

def calculate_standard_deviation(numbers):
    mean = calculate_mean(numbers)
    deviations = numbers - mean
    squared_deviations = deviations ** 2
    variance = np.sum(squared_deviations) / (len(numbers) -1)
    standard_deviation = np.sqrt(variance)
    return standard_deviation

def create_new_array(numbers):
    mean = calculate_mean(numbers)
    std_dev = calculate_standard_deviation(numbers)
    threshold = mean + (1.5 * std_dev)
    new_array = [num for num in numbers if num > threshold]
    if len(new_array) == 0:
        return None
    else:
        return new_array

# Test case
numbers = [10, 8, 13, 9, 14, 25, -5, 20, 7, 7, 4]
mean = calculate_mean(numbers)
std_dev = calculate_standard_deviation(numbers)
new_array = create_new_array(numbers)

print("Mean:", mean)
print("Standard Deviation:", std_dev)
print("New Array:", new_array)
