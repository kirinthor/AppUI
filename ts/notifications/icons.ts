export interface Icon {
  name: string
  color?: string
}

export const colors = {
  'success': 'text-success',
  'error': 'text-error',
  'info': 'text-info',
  'warning': 'text-warning',
  'question': 'text-secondary'
}

export const icons = {
  'success': { name: 'check-circle', color: colors['success'] },
  'error': { name: 'exclamation', color: colors['error'] },
  'info': { name: 'information-circle', color: colors['info'] },
  'warning': { name: 'exclamation-circle', color: colors['warning'] },
  'question': { name: 'question-mark-circle', color: colors['question'] }
}

export const parseIcon = (options: Icon): Icon => {
  if (icons[options.name]) {
    const { name, color } = icons[options.name] as Icon
    options.name = name
    if (!options.color) { options.color = color }
  }

  return options
}
