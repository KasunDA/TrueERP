%% Bilge Maras S009842 Industrial Engineering

function index = findMax(array, i)
  index = i;
  
  for j = i:length(array)
    if array(j) > array(index)
      index = j;
    end
  end
end
